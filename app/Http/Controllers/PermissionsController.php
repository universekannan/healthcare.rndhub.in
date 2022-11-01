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
use Illuminate\Support\Facades\Hash;

use Exception;
use App\Models\Core\Images;
use Validator;
use Auth;
use ZipArchive;
use File;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class PermissionsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
		
        
/******   Manage Users  Start ******/
		
 public function manageusers(){
	$manageusers = DB::table('user_permission')->select('user_permission.*','users.*','user_types.*','user_permission.id as userID')
            ->Join('users', 'users.id', '=', 'user_permission.user_id')
            ->Join('user_types', 'user_types.id', '=', 'users.user_types_id')
            ->orderBy('user_permission.id','Asc')->get();

        $userrole = DB::table('user_types')->where('status', '=','1')->orderBy('id','Asc')->get();

            return view("users.permissions")->with('manageusers', $manageusers)->with('userrole', $userrole) ;
        }
		
/******   Manage Users End ******/

        public function addRoles(Request $request){
                $dashboard                 = $request->dashboard == null ? 0 : 1;
                $roles                     = $request->roles == null ? 0 : 1;
                $addrole                   = $request->addrole == null ? 0 : 1;
                $editrole                  = $request->editrole == null ? 0 : 1;
                $deleterole                = $request->deleterole == null ? 0 : 1;
                $users                     = $request->users == null ? 0 : 1;
                $adduser                   = $request->adduser == null ? 0 : 1;
                $edituser                  = $request->edituser == null ? 0 : 1;
                $deleteuser                = $request->deleteuser == null ? 0 : 1;
                $patients                  = $request->patients == null ? 0 : 1;
                $addpatient                = $request->addpatient == null ? 0 : 1;
                $editpatient               = $request->editpatient == null ? 0 : 1;
                $deletepatient             = $request->deletepatient == null ? 0 : 1;
                $blocks                    = $request->blocks == null ? 0 : 1;
                $addblock                  = $request->addblock == null ? 0 : 1;
                $editblock                 = $request->editblock == null ? 0 : 1;
                $deleteblock               = $request->deleteblock == null ? 0 : 1;
                $rooms                     = $request->rooms == null ? 0 : 1;
                $addroom                   = $request->addroom == null ? 0 : 1;
                $editroom                  = $request->editroom == null ? 0 : 1;
                $deleteroom                = $request->deleteroom == null ? 0 : 1;
                $admission                 = $request->admission == null ? 0 : 1;
                $billing                   = $request->billing == null ? 0 : 1;
                $pharmacy                  = $request->pharmacy == null ? 0 : 1;
                $investigation             = $request->investigation == null ? 0 : 1;
                $ot                        = $request->ot == null ? 0 : 1;
                $mrd                       = $request->mrd == null ? 0 : 1;
                $appointments              = $request->appointments == null ? 0 : 1;
                $mis                       = $request->mis == null ? 0 : 1;

		$addroles = DB::table('user_permission')->where('user_id',$request->user_id)->update([
		'dashboard'                 => $dashboard,
                'roles'                     => $roles,
                'addrole'                   => $addrole,
                'editrole'                  => $editrole,
                'deleterole'                => $deleterole,
                'users'                     => $users,
                'adduser'                   => $adduser,
                'edituser'                  => $edituser,
                'deleteuser'                => $deleteuser,
                'patients'                  => $patients,
                'addpatient'                => $addpatient,
                'editpatient'               => $editpatient,
                'deletepatient'             => $deletepatient,
                'blocks'                    => $blocks,
                'addblock'                  => $addblock,
                'editblock'                 => $editblock,
                'deleteblock'               => $deleteblock,
                'rooms'                     => $rooms,
                'addroom'                   => $addroom,
                'editroom'                  => $editroom,
                'deleteroom'                => $deleteroom,
                'admission'                 => $admission,
                'billing'                   => $billing,
                'pharmacy'                  => $pharmacy,
                'investigation'             => $investigation,
                'ot'                        => $ot,
                'mrd'                       => $mrd,
                'appointments'              => $appointments,
                'mis'                       => $mis,
		]);
                return redirect()->back();
        }

public function roles(Request $request){

        $roles = DB::table('user_types')->insert([
                'groups_name'           =>   $request->groups_name,
                'status'                =>   1,
                ]);
                                  
            return redirect()->back(); 
        }
}
