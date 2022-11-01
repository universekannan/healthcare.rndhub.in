<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


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


class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /******   Login page Start ******/

        public function login(){
            return view('login');
        }

    /******   logout page  End ******/


    /******   Login Start ******/

        public function checkLogin(Request $request){

            $adminInfo = array("email" => $request->email, "password" => $request->password);
			if(auth()->attempt($adminInfo)) {
				$admin = auth()->user();
				$administrators = DB::table('users')->where('id', $admin->myid)->get();
                //print_r($admin->id);die();
				session(['administrators' => $administrators]);
                if($admin->user_types_id == 1){
                    return redirect()->intended('/dashboard')->with('administrators', $administrators);
                } if($admin->user_types_id == 2){
                    return redirect()->intended('/dashboard')->with('administrators', $administrators);
                } else{
                  return redirect()->intended('/dashboard')->with('administrators', $administrators);
                }
            } else {
                return redirect('/')->with('loginError','Email or Password is incorrect');
            }
            
        }

    /******   Login End ******/


    /******   logout Start ******/

        public function logout(){
            Auth::guard()->logout();
            return redirect()->intended('/');
        }

    /******   logout End ******/










}
