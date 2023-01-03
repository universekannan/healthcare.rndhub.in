<?php
  
namespace App\Http\Controllers;
  
use DB;
use Log;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Mail\Withdrawal;
use Illuminate\Support\Facades\Mail;
  
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = Payment::Where('userId', Auth::user()->id)->orderBy('created_at', 'desc')->limit(20)->get();
  
        return view('payment.index',compact('payment'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')->get();
        return view('payment.create',compact('users'));
    }

    public function transfer()
    {
        $data['users'] = DB::table('users')->where('id', '!=', 1)->get();
        $parentCurrent = DB::table('users')->where('id', Auth::user()->id)->first();

        $parentCurrentPlan = $parentCurrent->userplan;

        $activateLimits = DB::table('plan')->where('planName', Auth::user()->userplan)->first();

        log::info('Auth user plan: '.Auth::user()->userplan);

        log::info('plan id: '.$activateLimits->planId);

        if($activateLimits !== NULL)
        {
            log::info('lookme');
            for($i = $activateLimits->planId; $i > 0; $i--)
            {
                log::info('plan id: '.$activateLimits->planId);
                log::info('i is: '.$i);
                $activateLimits = DB::table('plan')->where('planId', $i)->first();
                $sumPrev = DB::table('plan')->where('planId', '<', $activateLimits->planId)->SUM('activation_count');



                $activation_count = $activateLimits->activation_count + $sumPrev;

                $countChild = DB::table('users')->where('reference_user', Auth::user()->id)->where('userplan', '!=', NULL)->count();

                log::info('countChild '.$countChild);
                log::info('activation_count '.$activation_count);

                if($countChild >= $activation_count)
                {
                    // Make it Activated
                    log::info('iam i '.$i);
                    DB::table('autopool_income')->where('planId', $i)->where('parentId', Auth::user()->id)->update([
                        'isActivated' => 1
                    ]);
                }


            }
        }


        $data['autopoolamount'] = DB::table('autopool_income')->where('isActivated', 0)->where('parentId', Auth::user()->id)->sum('levelAmount');
        return view('payment.transfer')->with($data);
    }

    public function withdrawal()
    {
        // select all the payments

        // $countChild = DB::table('users')->where('reference_user', Auth::user()->id)->where('userplan', '!=' NULL)->count();
        $parentCurrent = DB::table('users')->where('id', Auth::user()->id)->first();

        $parentCurrentPlan = $parentCurrent->userplan;

        $activateLimits = DB::table('plan')->where('planName', Auth::user()->userplan)->first();

        log::info('Auth user plan: '.Auth::user()->userplan);

        log::info('plan id: '.$activateLimits->planId);

        if($activateLimits !== NULL)
        {
            log::info('lookme');
            for($i = $activateLimits->planId; $i > 0; $i--)
            {
                log::info('plan id: '.$activateLimits->planId);
                log::info('i is: '.$i);
                $activateLimits = DB::table('plan')->where('planId', $i)->first();
                $sumPrev = DB::table('plan')->where('planId', '<', $activateLimits->planId)->SUM('activation_count');



                $activation_count = $activateLimits->activation_count + $sumPrev;

                $countChild = DB::table('users')->where('reference_user', Auth::user()->id)->where('userplan', '!=', NULL)->count();

                log::info('countChild '.$countChild);
                log::info('activation_count '.$activation_count);

                if($countChild >= $activation_count)
                {
                    // Make it Activated
                    log::info('iam i '.$i);
                    DB::table('autopool_income')->where('planId', $i)->where('parentId', Auth::user()->id)->update([
                        'isActivated' => 1
                    ]);
                }


            }
        }


        $data['autopoolamount'] = DB::table('autopool_income')->where('isActivated', 0)->where('parentId', Auth::user()->id)->sum('levelAmount');
        return view('payment.withdrawal')->with($data);
    }

    public function search(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $payment = Payment::whereBetween('created_at', [date('Y-m-d', strtotime($from_date))." 00:00:00", date('Y-m-d', strtotime($to_date))." 23:59:59"])->get();
        // $payment = Payment::orderBy('paymentId', 'asc')->get();
        return view('payment.index',compact('payment'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'userid' => 'required',
            'amount' => 'required',
            'description' => 'required'
        ]);
        $userid = $request->userid;
        $splitValue = explode('-', $userid, 2);
        $userid = $splitValue[0];
        $uniqueId = !empty($splitValue[1]) ? $splitValue[1] : '';

        // credited wallet
        $this->credited($userid, $uniqueId, $request->amount, $request->description);

        return redirect()->route('payment.index')
                        ->with('success','Payment debited successfully.');
    }

    public function fundtranser(Request $request)
    {
        
        $request->validate([
            'userid' => 'required',
            'tamount' => 'required',
            'description' => 'required',
            'tpassword' => 'required'
        ]);
        $userid = $request->userid;
        $splitValue = explode('-', $userid, 3);
        $userid = $splitValue[0];
        $uniqueId = !empty($splitValue[1]) ? $splitValue[1] : '';
        $amount = !empty($splitValue[2]) ? $splitValue[2] : '';
        $tamount = $request->tamount;

        if(Auth::user()->wallet < $tamount) {
            return redirect()->route('transfer')
                        ->with('success','Insufficient balance.');
        }

        if(Auth::user()->transferPin != $request->tpassword) {
            return redirect()->route('transfer')
                        ->with('success','Incorrect transaction password.');
        }

        // credited wallet
        $this->credited($userid, $uniqueId, $tamount, $request->description);

        // debited wallet
        $this->debited(Auth::user()->id, Auth::user()->uniqueId, $tamount, $request->description);

        return redirect()->route('transfer')
                        ->with('success','Fund transfered successfully.');
    }

    public function withdraw(Request $request)
    {
        log::info($request->all());
        $request->validate([
            'cbalance' => 'required',
            'totalBalance' => 'required',
            'waitingForApproval' => 'required',
            'tamount' => 'required',
            'tds' => 'required',
            'rebirth' => 'required',
            'youWillGet' => 'required',
            'nbalance' => 'required',
            'description' => 'required',
            'tpassword' => 'required',
        ]);

        log::info('test1');

        $tamount = $request->tamount;

        if(Auth::user()->wallet < $tamount) {
            return back()
                        ->with('error','Insufficient balance.');
        }

        if(Auth::user()->transferPin != $request->tpassword) {
            return back()->with('error','Incorrect transaction password.');
        }

        DB::table('withdrawal')->insert([
            'userId' => Auth::user()->id,
            'totalBalance' => $request->totalBalance,
            'waitingForApproval' => $request->waitingForApproval,
            'curBalance' => $request->cbalance,
            'withdraw' => $request->tamount,
            'tds' => $request->tds,
            'rebirth' => $request->rebirth,
            'youWillGet' => $request->youWillGet,
            'newBalance' => $request->nbalance,
            'description' => $request->description,
            'approvedStatus' => 0,
            'created_by' => Auth::user()->id,
        ]);

        

        log::info('test2');

        $newamount = $request->totalBalance - $request->tamount;
        $rebirths = DB::table('users')->find(Auth::user()->id)->rebirths;
        $newrebirths = (int)$rebirths + (int)$request->rebirth;
		
        $sub = DB::table('users')->where('id', Auth::user()->id)->update(['wallet' => $newamount,'rebirths' => $newrebirths]);

        Mail::to(Auth::user())->send(new Withdrawal($request));

        return redirect()->route('withdrawal')
                        ->with('success','Admin processing your request. after 24 hrs refund the amount');
    }

    public function credited($userid,$uniqueId, $amount, $description) {
            // Amount credited
            $wallet = DB::table('users')->find($userid)->wallet;
            $total = (int)$wallet + (int)$amount;
            $pusers = DB::table('users')->where('id', $userid)->update(['wallet' => $total]);

            // User credited the wallet amount
            Payment::create([
                'userId' => $userid,
                'uniqueId' => $uniqueId,
                'amount' => $amount,
                'description' => $description,
                'balance' => $total,
                'type' => 'CREDIT',
                'status' => 0,
                'created_by' => Auth::user()->id,
            ]);
            return true;
    }

    public function debited($userid,$uniqueId, $amount, $description) {

            // Amount debited
            $wallet = DB::table('users')->find($userid)->wallet;
            $total = (int)$wallet - (int)$amount;
            $pusers = DB::table('users')->where('id', $userid)->update(['wallet' => $total]);
            // User debited the wallet amount
            Payment::create([
                'userId' => $userid,
                'uniqueId' => $uniqueId,
                'amount' => $amount,
                'description' => $description,
                'balance' => $total,
                'type' => 'DEBIT',
                'status' => 0,
                'created_by' => Auth::user()->id,
            ]);
            return true;
    }

    public function newrequest()
    {
        $data['withdrawal'] = DB::table('withdrawal')->select('withdrawal.*', 'users.uniqueId')->leftjoin('users', 'users.id', '=', 'withdrawal.userId')->where('approvedStatus', 0)->get();
        return view('payment.newrequest')->with($data);
    }

    public function transactions(Request $request)
    {
        # code...
        $input = $request->all();
        log::info($input);

        if(Auth::user()->transferPin != $input['tpassword']) {
            return back()->with('error','Incorrect transaction password.');
        }

        $result = DB::table('transactions')->insert([
            'uniqueId' => $input['uniqueId'],
            'withdrawalId' => $input['withdrawalId'],
            'transactionAmount' => $input['transactionAmount'],
            'notes' => $input['notes'],
            'created_at' => Carbon::now()
        ]);

        DB::table('withdrawal')->where('id', $input['withdrawalId'])->update([
            'approvedStatus' => 1
        ]);

        if(!$result)
        {
            return back()->with('error','Failed to Pay');
        }

        return back()->with('success','You have paid successfully');
    }
}