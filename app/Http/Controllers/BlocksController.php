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
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class BlocksController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

/******   Manage Users  Start ******/
		
        public function manageBlocks(){
		  $manageblocks = DB::table('blocks')->orderBy('id','Asc')->get();
            return view("blocks.index")->with('manageblocks', $manageblocks);
        }

        public function manageRoom($id){
		  $manageroom = DB::table('rooms')
                ->Join('blocks', 'blocks.id', '=', 'rooms.block_id')
                ->where('rooms.block_id', '=',$id)->orderBy('rooms.id','Asc')->get();
			return view("blocks.rooms")->with('manageroom', $manageroom);
        }

        public function manageBeds($id){
		  $managebeds = DB::table('beds')
                ->Join('rooms', 'rooms.id', '=', 'beds.room_id')
                ->where('beds.room_id', '=',$id)->orderBy('beds.id','Asc')->get();
			return view("blocks.beds")->with('managebeds', $managebeds);
        }

/******   Manage Users End ******/  
public function addBlock(Request $request){
            $addblock = DB::table('blocks')->insert([
                'block_name'	        =>   $request->block_name,
                'status'		        =>   $request->status,
                ]);
 
            return redirect()->back(); 
        }

/******   Add Users  Start ******/
 
		public function addRoom(Request $request){

            $addroom = DB::table('rooms')->insert([
                'block_id'              =>   $request->block_id,
                'room_name'	            =>   $request->room_name,
                'status'		        =>   $request->status,
                ]);
 
            return redirect()->back(); 
        }

/******   Add Users End ******/

/******   Edit Users  Start ******/

        public function editBlock(Request $request){

            $editblock = DB::table('blocks')->where('id',$request->id)->update([
                'block_name'	        =>   $request->block_name,
                'status'		        =>   $request->status,
                ]);

            return redirect()->back(); 
        }
		
		public function editRoom(Request $request){

            $editroom = DB::table('rooms')->where('id',$request->id)->update([
                'block_id'	            =>   $request->block_id,
                'room_name'	            =>   $request->room_name,
                'status'		        =>   $request->status,
                ]);

            return redirect()->back(); 
        }

/******   Edit Users End ******/

/******    Delete Users  Start ******/

        public function deleteUser(Request $request){

            $deluser = DB::table('users')->where('id',$request->id)->delete();
            return redirect()->back(); 

        }

/******   Delete Users  End ******/

/******   Delete Patients  Start ******/
       public function managePatients(){
			$managepatients = DB::table('users')
                ->Join('patient_disease', 'patient_disease.id', '=', 'users.disease_id')
                ->where('users.role_id', '=','2')->get();
            return view("patients.index")->with('managepatients', $managepatients);

        }
/******   Delete Patients  End ******/
/******    Sorting Users  Start ******/

        public function planSorting(Request $request)
        {
            $array  = $request->arrayorder;
            //Print_r($array);die();
            if($request->update == "update")
            {
                $count = 1;
                
                foreach ($array as $idval)
                {
                    //$data=array('sort_order'=> $count);
                    $sortPlan = DB::table('manage_plan')->where('id',$idval)->update(['sort_order' =>   $count]);
                    $count ++;
                }
            }
            
            echo 'Manage Plan Order Change Successfully....!';
        }

/******    Sorting Users  End ******/


}
