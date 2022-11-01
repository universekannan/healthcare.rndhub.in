<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;

use App\Models\Core\Setting;
use App\Models\Admin\Admin;
use App\Models\Core\Order;
use App\Models\Core\Customers;
use App\Models\Core\Drivers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Exception;
use App\Models\Core\Images;
use Validator;
use Hash;
use Auth;
use ZipArchive;
use File;
use Carbon\Carbon;
use DateTime;
use Storage;

class AppointmentsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /******    Reminder  Start ******/

        public function manageAppointments(){
            
            return view("appointments.index");

        }

    /******   Reminder  End ******/


    /******    Add Event  Start ******/

        public function addEvent(Request $request){

            $mangeRolesUpdate = DB::table('reminder_event')->insert([

                'event_name'    =>   $request->event_name,
                'event_date'	=>   $request->event_date,
                'event_time'	=>   $request->event_time,
                'status'		=>   1,
                'created_at'	=>	 date('Y-m-d H:i:s'),
                ]);

            return redirect()->back(); 

        }

    /******   Add Event  End ******/


    /******    Edit Event  Start ******/

        public function editEvent(Request $request,$id){

            $editevent = DB::table('reminder_event')->where('id','=',$id)->first();
            return view("patients.edit_event")->with('editevent',$editevent);

        }

    /******   Edit Event  End ******/


    /******    Update Event  Start ******/

        public function updateEvent(Request $request){

            $updateEvent = DB::table('reminder_event')->where('id',$request->id)->update([

                'event_name'    =>   $request->event_name,
                'event_date'	=>   $request->event_date,
                'event_time'	=>   $request->event_time,
                'status'		=>   1,
                'created_at'	=>	 date('Y-m-d H:i:s'),
                ]);

            return redirect()->back()->with('success','Event Updated Successfully ... !'); 

        }

    /******   Update Event  End ******/


    /******    Delete Event  Start ******/

        public function deleteEvent(Request $request){

            $delEvent = DB::table('reminder_event')->where('id',$request->delid)->delete();

            return view("patients.reminder");

        }

    /******   Delete Event  End ******/


    /******    Add Event  Start ******/

        public function calandarData(){

            $event = DB::table('reminder_event')->where('status',1)->orderBy('id','DESC')->get();
            $currentDate = date('Y-m-d');
            foreach($event as $eve){
                if($eve->event_name != ''){
                    $data[] = array(
                        'title'   => $eve->event_name. " / " .$eve->event_time,
                        'start'   => $eve->event_date,
                        'end'     => $eve->event_time,
                        'url'     => "edit_event/".$eve->id,
                        'backgroundColor'=> '#e74c3c',
                        'borderColor'=> '#e74c3c',
                    );
                }
            }

            echo json_encode($data);

        }

    /******   Add Event  End ******/

}
