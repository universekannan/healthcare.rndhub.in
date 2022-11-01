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

class CommonController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /******  Profile Start ******/

        public function profile(){

            $user = DB::table('users')->where('id','=', auth()->user()->id)->where('status','=', 1)->first(); 
            return view("general.profile")->with('user',$user);
            
        }

    /******    Profile  end ******/



    /******  Profile Update Start ******/

        public function profileUpdate(Request $request){

            $profile = DB::table('users')->where('id','=', auth()->user()->id)->update([
				'user_name'		=>	$request->first_name.'_'.$request->last_name,
				'first_name'	=>	$request->first_name,
				'last_name'		=>	$request->last_name,
				'address'		=>	$request->address,
				'phone'			=>	$request->phone,
				'gender'		=>	$request->sex,
				'updated_at'	=>	date('Y-m-d H:i:s'),
				]);

            return redirect()->back()->with('success','Profile Update Successfully....!');
            
        }

    /******    Profile Update end ******/


     /******  Profile Start ******/

        public function changePassword(Request $request){

            $orders_status = DB::table('users')->where('id','=', auth()->user()->id)->update(['password'=>Hash::make($request->password),'check_password'=>$request->password]);        

            return redirect()->back()->with('success','Password Change Successfully....!');
            
        }

    /******    Profile  end ******/



  

    
     /******  404 Start ******/

        public function notAllowed(){

            return view("general.404");
            
        }

    /******    404  end ******/

    /******  Total SMS Start ******/

        public function totalSmsEmail($filter){

            $alldatabase = DB::table('tb_database')->where('tb_database.status',1)->get();
            foreach($alldatabase as $database){
                DB::disconnect($database->folder_name);
                Config::set("database.connections.$database->folder_name", [
                    'driver' => 'mysql',
                    "host" => $database->db_ipaddress,
                    "database" => $database->db_name,
                    "username" => $database->db_username,
                    "password" => $database->db_password,
                    "port" => '3306',
                    'charset'   => 'utf8',
                    'collation' => 'utf8_unicode_ci',
                    'prefix'    => '',
                    'strict'    => false,
                ]);

                if($filter == 'all') {
                    $smsCount = DB::table('shop_otp')->orderBy('id','DESC')->count(); 
                    $emailCount = DB::table('shop_mail')->orderBy('id','DESC')->count();
                } else if($filter == 'yesterday') {

                    $yesterday = date('Y-m-d',strtotime("-1 days"));
                    $smsCount = DB::table('shop_otp')->orderBy('id','DESC')->whereDate('created_at',$yesterday)->count(); 
                    $emailCount = DB::table('shop_mail')->orderBy('id','DESC')->whereDate('created_at',$yesterday)->count();
          
                  } else if($filter == 'today') {

                    $currentDate = date('Y-m-d');
                    $smsCount = DB::table('shop_otp')->orderBy('id','DESC')->whereDate('created_at',$currentDate)->count(); 
                    $emailCount = DB::table('shop_mail')->orderBy('id','DESC')->whereDate('created_at',$currentDate)->count();

                  } else if($filter == 'month') {

                    $now = Carbon::now();
                    $monthStartDate = $now->startOfMonth()->format('Y-m-d');
                    $monthEndDate = $now->endOfMonth()->format('Y-m-d');
                    $smsCount = DB::table('shop_otp')->orderBy('id','DESC')->whereBetween('created_at', [$monthStartDate, $monthEndDate])->count(); 
                    $emailCount = DB::table('shop_mail')->orderBy('id','DESC')->whereBetween('created_at', [$monthStartDate, $monthEndDate])->count();

                  } else if($filter == 'custom') {

                    $fromDate = $_GET['start_date'];
                    $toDate = $_GET['end_date'];
                    $smsCount = DB::table('shop_otp')->orderBy('id','DESC')->whereBetween('created_at', [$fromDate, $toDate])->count(); 
                    $emailCount = DB::table('shop_mail')->orderBy('id','DESC')->whereBetween('created_at', [$fromDate, $toDate])->count();

                  }

                $totaluser = DB::table('tb_user')->where('status', '1')->orderBy('id','DESC')->get(); 
                return view("general.sms")->with('result', ['totaluser' => $totaluser, 'filter' => $filter,'smsCount'=>$smsCount,'emailCount'=>$emailCount]);

            }
        }

    /******    Total SMS   end ******/


    /******   Domain Request  Start ******/

        public function domainRequest(){

            $superadmin = DB::table('users')->where('id',1)->first();
            $admin = auth()->user();
            if($superadmin->id == $admin->id){
                $domain = DB::table('shop_custom_domain')->leftjoin('tb_user','tb_user.id','=','shop_custom_domain.shop_id')->select('shop_custom_domain.*','tb_user.*','shop_custom_domain.id as scdID')->where('shop_custom_domain.assign_status','!=',2)->orderBy('shop_custom_domain.id','DESC')->get();
            }else{
                $domain = DB::table('shop_custom_domain')->leftjoin('tb_user','tb_user.id','=','shop_custom_domain.shop_id')->select('shop_custom_domain.*','tb_user.*','shop_custom_domain.id as scdID')->where('shop_custom_domain.assign_status','!=',2)->where('shop_custom_domain.dev_id',$admin->id)->orderBy('shop_custom_domain.id','DESC')->get();
            }
            $developerRole = DB::table('users')->join('user_types','user_types.user_types_id','=','users.role_id')->where('user_types.user_types_id',6)->orderBy('users.id','DESC')->get();
            return view("general.domain_request")->with('domain', $domain)->with('developerRole', $developerRole);
        }

    /******    Domain Request End ******/

    /******   MailGun Start ******/

        public function mailMailGun($email,$subject,$html){

            $MailData            = array();
            $api_key             = 'key-f8a02d96988841f41ae9a37c75057994';
            $domain              = 'platinum24.net';
            $MailData['from']    = 'no-reply@platinum24.net';
            $MailData['to']      =  $email;
            //$MailData['bcc']     = 'reju@platinumcode.com.my';
            $MailData['subject'] = $subject;
            $MailData['html']    = $html;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, 'api:'.$api_key);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/'.$domain.'/messages'); // Live
            //curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/sandbox5aa5969accf94fbe95114e85c4e7fd89.mailgun.org/messages'); // SanbBox
            curl_setopt($ch, CURLOPT_POSTFIELDS, $MailData);
            $resultss = curl_exec($ch);
            curl_close($ch);  
            //echo $resultss;
            //return $result;

        }

    /******   MailGun End ******/

     /******   Domain Status Change  Start ******/

        public function domainstatus_change(Request $request){

            if($request->status_id == '1' && $request->role_id != ''){

                $user = DB::table('users')->where('id',$request->role_id)->first();
                $tbuser = DB::table('tb_user')->where('id',$request->shop_id)->first();

                $current_domain = $tbuser->current_domain;
                $shopName = $request->shop_name;
                $reqDomain = $request->request_domain;

                $email = $user->email;
                $subject = 'You have one domain request';
                $html = 'You have one domain request for '.$shopName .' and the current domain is '.$current_domain.' the customer request domain is '.$reqDomain;

                $this->mailMailGun($email,$subject,$html);
               
            }

            if($request->role_id != ''){
                $devID = $request->role_id;
            }else{
                $devID = 0;
            }
            $requestDoamin = "https://".$request->request_domain;
            //print_r($request->id);die();
            $result = DB::table('shop_custom_domain')->where('id', $request->id)->update(['assign_status' => $request->status_id,'dev_id'=> $devID]);
            
            if($request->status_id == '2'){

                DB::disconnect('likyan');
                Config::set("database.connections.likyan", [
                    'driver' => 'mysql',
                    "host" => "mysql.freehostia.com",
                    "database" => "likyan_superadmin_errorlog",
                    "username" => "likyan_superadmin_errorlog",
                    "password" => "ierSQQ739+",
                    "port" => '3306',
                    'charset'   => 'utf8',
                    'collation' => 'utf8_unicode_ci',
                    'prefix'    => '',
                    'strict'    => false,
                ]);

                $resultupdate = DB::connection('likyan')->table('tb_user')->where('id', $request->shop_id)->update(['current_domain'=> $requestDoamin]);

                $result = DB::table('tb_user')->where('id', $request->shop_id)->update(['current_domain'=> $requestDoamin]);

                $history = DB::table('history')->insert([
                    'comments'      =>   'Domain Completed',
                    'user_id'	    =>   auth()->user()->id,
                    'shop_id'	    =>   $request->shop_id,
                    'shop_name'	    =>   $request->shop_name,
                    'created_at'	=>	 date('Y-m-d H:i:s'),
                    ]);

            }
            return redirect()->back();

        }

    /******    Domain Status Change End ******/


    /******   Domain Check  Start ******/

        public function domainCheck(Request $request){

            $fcmUrl = 'https://api.geekflare.com/dnsrecord';
            $subscription_key = '51bed3c5-b6c0-412f-bb1c-9fd7c8d24035';
            $urlData = 'https://platinum24.net';
            $contentTypeData = 'application/json';

            $jsonData = [
                'url'        => 'https://'.$request->shopDomainName
            ];
            
            $payload = json_encode( array( "url"=> $urlData ) );

            $request_headers = array(
                        "x-api-key:" . $subscription_key,
                        "Content-Type:" . $contentTypeData
                    );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$fcmUrl);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($jsonData));
            $result = curl_exec($ch);
            curl_close($ch);
           
            echo $result;

        }

    /******    Domain Check End ******/

    /******   Domain Update  Start ******/

        public function domainUpdate(Request $request){
            
            $result = DB::table('shop_custom_domain')->where('shop_domain_name', $request->domain)->update(['arecord' => $request->istatus]);

            $domainshop = DB::table('shop_custom_domain')->where('shop_domain_name',$request->domain)->first();

            // $database = DB::table('tb_database')->join('tb_user','tb_user.id','=','tb_database.user_id')->where('tb_user.shop_name',$domainshop->shop_name)->where('tb_database.status',1)->first();
            // DB::disconnect($database->folder_name);
            // Config::set("database.connections.$database->folder_name", [
            //     'driver' => 'mysql',
            //     "host" => $database->db_ipaddress,
            //     "database" => $database->db_name,
            //     "username" => $database->db_username,
            //     "password" => $database->db_password,
            //     "port" => '3306',
            //     'charset'   => 'utf8',
            //     'collation' => 'utf8_unicode_ci',
            //     'prefix'    => '',
            //     'strict'    => false,
            // ]);

            // $result = DB::connection($database->folder_name)->table('custom_domain')->where('domain_name', $request->domain)->update(['arecord' => $request->istatus]);

            echo json_encode($domainshop->arecord);

        }

    /******   Domain Update  Start ******/


    /******  Facebook Pending Start ******/

        public function fbPending(){

            $fbPending = DB::table('fb_pending')->select('fb_pending.*','tb_user.*','tb_user.id as user_id','fb_pending.id as aid')->join('tb_user','tb_user.id','=','fb_pending.shop_id')->where('fb_pending.status',0)->orderBy('fb_pending.id','DESC')->get();
            return view("general.facebook_pending")->with('fbPending',$fbPending);
            
        }

    /******    Facebook Pending  end ******/


     /******  Facebook data update Start ******/

        public function facebookUpdate(Request $request){

            $database = DB::table('tb_database')->where('status',1)->where('user_id',$request->user_id)->first();
                DB::disconnect($database->folder_name);
                Config::set("database.connections.$database->folder_name", [
                    'driver' => 'mysql',
                    "host" => $database->db_ipaddress,
                    "database" => $database->db_name,
                    "username" => $database->db_username,
                    "password" => $database->db_password,
                    "port" => '3306',
                    'charset'   => 'utf8',
                    'collation' => 'utf8_unicode_ci',
                    'prefix'    => '',
                    'strict'    => false,
                ]);

            $appid = DB::connection($database->folder_name)->table('settings')->where('id', '1')->update(['value' => $request->facebook_app_id]);
            $secrt = DB::connection($database->folder_name)->table('settings')->where('id','2')->update(['value' =>$request->facebook_secret_id]);$url = DB::connection($database->folder_name)->table('settings')->where('id','115')->update(['value' =>$request->facebook_callback_url]);
            $facebooklogin = DB::connection($database->folder_name)->table('settings')->where('id','3')->update(['value' =>1]);

            $facebook = DB::table('fb_pending')->where('id', '=', $request->id)->update([
                
                'facebook_app_id'       =>   $request->facebook_app_id,
                'facebook_secret_id'    =>   $request->facebook_secret_id,
                'facebook_callback_url' =>   $request->facebook_callback_url,
                'status'                =>   1,

            ]);

            return redirect()->back();

        }

    /******    Facebook data update  end ******/

    /******    Google Pending  Start ******/

        public function googlePending(){

            $googlePending = DB::table('google_pending')->select('google_pending.*','tb_user.*','tb_user.id as user_id','google_pending.id as aid')->join('tb_user','tb_user.id','=','google_pending.shop_id')->where('google_pending.status',0)->orderBy('google_pending.id','DESC')->get();
            return view("general.google_pending")->with('googlePending',$googlePending);

        }

    /******   Google Pending  End ******/

    /******  Google data update Start ******/

        public function googleUpdate(Request $request){

            $database = DB::table('tb_database')->where('status',1)->where('user_id',$request->user_id)->first();
                DB::disconnect($database->folder_name);
                Config::set("database.connections.$database->folder_name", [
                    'driver' => 'mysql',
                    "host" => $database->db_ipaddress,
                    "database" => $database->db_name,
                    "username" => $database->db_username,
                    "password" => $database->db_password,
                    "port" => '3306',
                    'charset'   => 'utf8',
                    'collation' => 'utf8_unicode_ci',
                    'prefix'    => '',
                    'strict'    => false,
                ]);

                $appid = DB::connection($database->folder_name)->table('settings')->where('id', '116')->update(['value' => $request->google_app_id]);
                $secrt = DB::connection($database->folder_name)->table('settings')->where('id','117')->update(['value' => $request->google_secret_id]);$url = DB::connection($database->folder_name)->table('settings')->where('id','118')->update(['value' =>$request->google_callback_url]);
                $googlelogin = DB::connection($database->folder_name)->table('settings')->where('id','62')->update(['value' =>1]);

                $google = DB::table('google_pending')->where('id', '=', $request->id)->update([
                
                    'google_app_id'       =>   $request->google_app_id,
                    'google_secret_id'    =>   $request->google_secret_id,
                    'google_callback_url' =>   $request->google_callback_url,
                    'status'              =>   1,
    
                ]);
                
                return redirect()->back();

        }

    /******    Google data update  end ******/



    /******   Notification List  Start ******/

        public function notificationList(){
            $notificationList = DB::table('notification')->orderBy('id','DESC')->get();
            return view("general.notification")->with('notificationList', $notificationList);
        }

    /******    Notification List End ******/


    /******   Notification List Update  Start ******/

        public function notificationUpdate(Request $request,$name,$id){

            $shopid = $request->shop_id;

            if($name == 'domainrequest'){
                $notiUpdate = DB::table('notification')->where('id',$id)->update(['status'=> 0]);
                $domain = DB::table('shop_custom_domain')->orderBy('id','DESC')->get();
                $developerRole = DB::table('users')->join('user_types','user_types.user_types_id','=','users.role_id')->where('user_types.user_types_id',6)->orderBy('users.id','DESC')->get();
                return view("general.domain_request")->with('domain', $domain)->with('developerRole',$developerRole);

            } else if($name == 'domainexpired'){

                $notiUpdate = DB::table('notification')->where('id',$id)->update(['status'=> 0]);
                $database = DB::table('tb_database')->join('tb_user','tb_user.id','=','tb_database.user_id')->where('tb_user.id',$shopid)->where('tb_database.status',1)->first();
                DB::disconnect($database->folder_name);
                Config::set("database.connections.$database->folder_name", [
                    'driver' => 'mysql',
                    "host" => $database->db_ipaddress,
                    "database" => $database->db_name,
                    "username" => $database->db_username,
                    "password" => $database->db_password,
                    "port" => '3306',
                    'charset'   => 'utf8',
                    'collation' => 'utf8_unicode_ci',
                    'prefix'    => '',
                    'strict'    => false,
                ]);

                $result['user'] = DB::table('tb_user')->where('id',$shopid)->first();
                $result['smsCount'] = DB::table('shop_otp')->where('shop_id',$shopid)->count();
                $result['emailCount'] = DB::table('shop_mail')->where('shop_id',$shopid)->count();
                $result['product'] = DB::connection($database->folder_name)->table('products')->where('products_status',1)->count();
                $result['order'] = DB::connection($database->folder_name)->table('orders')->count();
                return view("shopdashboard")->with('result', $result);

            } else if($name == 'facebook'){

                $notiUpdate = DB::table('notification')->where('id',$id)->update(['status'=> 0]);
                return view("general.facebook_pending");

            } else if($name == 'google'){

                $notiUpdate = DB::table('notification')->where('id',$id)->update(['status'=> 0]);
                return view("general.google_pending");

            } else if($name == 'tickets'){

                $notiUpdate = DB::table('notification')->where('id',$id)->update(['status'=> 0]);
                
                $open_tickets = DB::table('tickets') ->orderByDesc('id')->where('status', '=', 1)->paginate(50);
                return view("ticket.view_ticket")->with('open_tickets',$open_tickets);

            } 
            
        }

    /******    Notification List Update End ******/    
   
    /******   AJAX Notification Count  Start ******/

        // public function ajaxNotiCount(){

        //     $currentdateTime = date('Y-m-d');
        //    $notificationCount = DB::table('notification')->where('status',1)->whereDate('created_at',$currentdateTime)->orderBy('id','DESC')->count();
        //     $content = "";
        //     $permission = DB::table('user_permission')->where('user_types_id',auth()->user()->id)->first();
        //     $notificationData = DB::table('notification')->whereDate('created_at',$currentdateTime)->where('status',1)->limit(10)->get(); 
        //     $content .= '<span style="text-align:center" class="dropdown-item dropdown-header">'.$notificationCount.' '.'Notifications</span>';
            
        //     $content .= '<div class="dropdown-divider"></div>';
        //         foreach($notificationData as $notiData){
                   
        //             $endDate = DB::table('tb_user')->where('id',$notiData->shop_id)->first(); 
        //             $fdate = $currentdateTime;
        //             $tdate = $endDate->end_date;
        //             $datetime1 = new DateTime($fdate);
        //             $datetime2 = new DateTime($tdate);
        //             $interval = $datetime1->diff($datetime2);
        //             $days = $interval->format('%a');
                
        //             if($notiData->comments == 'Domain Request' && $permission->domain_request == 1){ 
        //                 $url1 = url('notification_update/domainrequest/'.$notiData->id);
        //                 $content .= '<a href="'.$url1.'" class="dropdown-item">';
        //                 $content .= '<i class="fas fa-handshake mr-2"></i>';
        //                 $content .=  ''.$notiData->shop_name.' '.$notiData->comments.'';
        //                 $content .= '<span class="float-right text-muted text-sm">'.\Carbon\Carbon::parse($notiData->created_at)->diffForHumans().'</span>';
        //                 $content .= '</a>';
        //                 $content .= '<div class="dropdown-divider"></div>';
        //             } elseif($notiData->comments == 'Domain Expired' && $permission->expired_merchant == 1){ 
        //                 $url2 = url('notification_update/domainexpired/'.$notiData->id);
        //                 $content .= '<input type="hidden" name="shop_id" value="'.$notiData->shop_id.'"/>';
        //                 $content .= '<a href="'.$url2.'" class="dropdown-item">';
        //                 $content .= '<i class="fas fa-university mr-2"></i>';
        //                 $content .=  ''.$notiData->shop_name.' '.$notiData->comments.' '.'in'.' '.$days.' '.'Days';
        //                 $content .= '<span class="float-right text-muted text-sm">'.\Carbon\Carbon::parse($notiData->created_at)->diffForHumans().'</span>';
        //                 $content .= '</a>';
        //                 $content .= '<div class="dropdown-divider"></div>';
        //             } elseif($notiData->comments == 'Facebook Pending' && $permission->facebook_pending == 1){ 
        //                 $url3 = url('notification_update/facebook/'.$notiData->id);
        //                 $content .= '<a href="'.$url3.'" class="dropdown-item">';
        //                 $content .= '<i class="fab fa-facebook mr-2"></i>';
        //                 $content .=  ''.$notiData->shop_name.' '.$notiData->comments.'';
        //                 $content .= '<span class="float-right text-muted text-sm">'.\Carbon\Carbon::parse($notiData->created_at)->diffForHumans().'</span>'.
        //                 $content .= '</a>';
        //                 $content .= '<div class="dropdown-divider"></div>';
        //             } elseif($notiData->comments == 'Google Pending' && $permission->google_pending == 1){ 
        //                 $url4 = url('notification_update/google/'.$notiData->id);
        //                 $content .= '<a href="'.$url4.'" class="dropdown-item">';
        //                 $content .= '<i class="fab fa-google  mr-2"></i>';
        //                 $content .=  ''.$notiData->shop_name.' '.$notiData->comments.'';
        //                 $content .= '<span class="float-right text-muted text-sm">'.\Carbon\Carbon::parse($notiData->created_at)->diffForHumans().'</span>';
        //                 $content .= '</a>';
        //                 $content .= '<div class="dropdown-divider"></div>';
        //             } elseif($notiData->comments == 'Tickets' && $permission->manage_ticket == 1){ 
        //                 $url5 = url('notification_update/tickets/'.$notiData->id);
        //                 $content .= '<a href="'.$url5.'" class="dropdown-item">';
        //                 $content .= '<i class="fa fa-check  mr-2"></i>';
        //                 $content .=  ''.$notiData->shop_name.' '.$notiData->comments.'';
        //                 $content .= '<span class="float-right text-muted text-sm">'.\Carbon\Carbon::parse($notiData->created_at)->diffForHumans().'</span>';
        //                 $content .= '</a>';
        //                 $content .= '<div class="dropdown-divider"></div>';
        //             } 
        //         }
        //         if($permission->notification == 1){
        //             $urlLast = "notification/";
        //             $content .= '<a href="'.$urlLast.'" style="text-align:center" class="dropdown-item dropdown-footer">See All Notifications</a>';
        //         }

        //         $output = array(
        //             'result'  => $content,
        //             'count'    => $notificationCount
        //         );
                
        //         echo json_encode($output);

        // }

    /******    AJAX Notification Count End ******/
    

    /******    Version Update  Start ******/

        public function versionUpdate(){

            $domain =  DB::table('domain_ftp')->where('status','=',1)->get();
            return view("general.version_update")->with('domain',$domain);

        }

    /******   Version Update  End ******/


    /******   Add Version Log  Start ******/

        public function versionLogsInsert(Request $request){


            $updateEvent = DB::table('version_update_log')->where('version_name',1)->update(['version_name' =>  0,]);

            $versionLogs = DB::table('version_update_log')->insert([

                'version_name'      =>   1,
                'update_version'    =>   $request->update_version,
                'version_reason'    =>   $request->update_reason,
                'created_at'	    =>	 date('Y-m-d H:i:s'),

                ]);
                
            return redirect()->back();

        }

    /******   Add Version Log  End ******/



     /******    Version Log  Start ******/

        public function versionLogs(){

            $versionLog =  DB::table('version_update_log')->orderBy('id','DESC')->get();
            return view("general.version_log")->with('versionLog',$versionLog);

        }

    /******   Version Log  End ******/


     /******    Version Update Save Start ******/

        public function versionUpdateSave(Request $request){

            if($request->choose == 'cfolder'){

                $validated = $request->validate([
                    'folder' => 'required',
                ]);

                $domainskip = $request->domain;
                if($domainskip[0] == 'all'){
                    $alldomain = array_slice($domainskip, 1);
                } else { 
                    $alldomain = $request->domain;
                }
                //print_r($alldomain);die();
                foreach($alldomain as $aDomain){

                    $fConn = DB::table('domain_ftp')->where('status','=',1)->where('id',$aDomain)->first();

                    $ftp_server = $fConn->host_name;
                    $ftp_user_name = $fConn->user_name;
                    $ftp_user_pass = $fConn->password;

                    $conn_id = ftp_connect($ftp_server);

                    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
                    if ((!$conn_id) || (!$login_result)) {
                        echo "FTP connection has failed!";
                        echo "Attempted to connect";
                        die;
                    } else {
                        echo "<br>FTP Connected<br>";
                    }
    
                    //$allfilelist = ftp_nlist($conn_id, ".");
                    //var_dump($contents);

                    $folder_name = str_replace(' ', '_', $request->folder);
                    $dir = $request->url.'/'.$folder_name;

                    $contents_on_server = ftp_nlist($conn_id, $dir);
                    //print_r($contents_on_server);die();
                    if(!is_array($contents_on_server)){
                        ftp_mkdir($conn_id, $dir);
                    } else{
                        return redirect()->back()->with('Fail', 'Folder Already Exists');
                    }
                }

                return redirect()->back()->with('success', 'Folder Created Successfully....!'); 

            } else{
        
                $validated = $request->validate([
                    'files' => 'required',
                ]);
    
                $alldomain = $request->domain;
                foreach($alldomain as $aDomain){
                    
                    $fConn = DB::table('domain_ftp')->where('status','=',1)->where('id',$aDomain)->first();

                    $ftp_server = $fConn->host_name;
                    $ftp_user_name = $fConn->user_name;
                    $ftp_user_pass = $fConn->password;

                    $conn_id = ftp_connect($ftp_server);

                    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
                    if ((!$conn_id) || (!$login_result)) {
                        echo "FTP connection has failed!";
                        echo "Attempted to connect";
                        die;
                    } else {
                        echo "<br>FTP Connected<br>";
                    }

                    $uploaddir = $request->url;

                    foreach ($_FILES["files"]["tmp_name"] as $key => $error){

                        $filep = $_FILES['files']['tmp_name'][$key];
                        $name = $_FILES['files']['name'][$key];
                        $uploadfile = $uploaddir .'/'. basename($name);
                        $upload = ftp_put( $conn_id , $uploadfile , $filep , FTP_BINARY );

                    }

                }
                
                return redirect()->back()->with('success', 'File Upload Successfully'); 
           }

        }

    /******   Version Update Save End ******/


    /******    Reminder  Start ******/

        public function reminder(){
            
            return view("general.reminder");

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
            return view("general.edit_event")->with('editevent',$editevent);

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

            return view("general.reminder");

        }

    /******   Delete Event  End ******/


    /******    Add Event  Start ******/

        public function calandarData(){

            $event = DB::table('reminder_event')->where('status',1)->orderBy('id','DESC')->get();
            $currentDate = date('Y-m-d');
            $domainExpired = DB::table('tb_user')->where('status', '1')->orderBy('id','DESC')->get();

            foreach($event as $eve){
                if($eve->event_name != ''){
                    $data[] = array(
                        'title'   => $eve->event_name,
                        'start'   => $eve->event_date,
                        'end'     => $eve->event_time,
                        'url'     => "edit_event/".$eve->id,
                        'backgroundColor'=> '#00bc8c',
                        'borderColor'=> '#00bc8c',
                    );
                }
            }

            foreach($domainExpired as $domExp){
                if($domExp->shop_name != ''){
                    $data[] = array(
                        'title'   => $domExp->first_name,
                        'start'   => date('Y-m-d',strtotime($domExp->end_date)),
                        'end'     => date('H:i:s',strtotime($domExp->end_date)),
                        'url'     => "shoplistdashboard/". $domExp->id,
                        'backgroundColor'=> '#e74c3c',
                        'borderColor'=> '#e74c3c',
                    );
                }
            }

            echo json_encode($data);

        }

    /******   Add Event  End ******/

     /******    Email Template  Start ******/

        public function emailTemplate(){
            
            return view("general.email_template");

        }

    /******   Email Template  End ******/


    /******    Error Log  Start ******/

        public function errorLog(Request $request){

            DB::disconnect('likyan');
            Config::set("database.connections.likyan", [
                'driver' => 'mysql',
                "host" => "mysql.freehostia.com",
                "database" => "likyan_superadmin_errorlog",
                "username" => "likyan_superadmin_errorlog",
                "password" => "ierSQQ739+",
                "port" => '3306',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
                'strict'    => false,
            ]);

            $errorLog = DB::connection('likyan')->table('error_log')
            ->when($request['domain_name'], function($result) use ($request){
                if($request['domain_name'] != ''){
                    return $result->whereRaw('domain_name ="'.$request['domain_name'].'"');
                }
            })
            ->when($request['date'], function($result) use ($request){
                if($request['date'] != ''){
                    return $result->whereRaw('DATE(created_at) ="'.$request['date'].'"');
                }
            })->when($request['status_code'], function($result) use ($request){
                if($request['status_code'] != ''){
                    return $result->whereRaw('code ="'.$request['status_code'].'"');
                }
            })->orderBy('id','DESC')->get();

            return view("general.error_log")->with('errorLog',$errorLog);

        }

    /******   Error Log  End ******/


    /******     Delete Error Log file  Start ******/

        public function errorLogFile(){
                
            $domain =  DB::table('domain_ftp')->where('status','=',1)->get();
            return view("general.error_log_file")->with('domain',$domain);

        }

    /******  Delete Error Log file   End ******/



    /******   Delete Error Log  Start ******/

        public function deleteErrorLog(Request $request){

            $alldomain = $request->domain;
            //print_r($alldomain);die();
            foreach($alldomain as $aDomain){
                
                $fConn = DB::table('domain_ftp')->where('status','=',1)->where('id',$aDomain)->first();

                $ftp_server = $fConn->host_name;
                $ftp_user_name = $fConn->user_name;
                $ftp_user_pass = $fConn->password;

                $conn_id = ftp_connect($ftp_server);

                $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
                if ((!$conn_id) || (!$login_result)) {
                    echo "FTP connection has failed!";
                    echo "Attempted to connect";
                    die;
                } else {
                    echo "<br>FTP Connected<br>";
                }

                $files = 'laravel.log';
                $file = '/storage/logs/'.$files;
                //print_r($file);die();
                $contents_on_server = ftp_nlist($conn_id, $file);
                if($contents_on_server != ''){
                    ftp_delete($conn_id, $file);
                }else{
                    echo "no file exists";
                }
            

            }

            return redirect()->back()->with('success','Error Log File Deleted Successfully ... !'); 

        }

    /******  Delete Error Log  End ******/


}
