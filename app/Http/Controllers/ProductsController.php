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


class ProductsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
/******   Manage ph_products Start ******/
		
      /* public function manageph_prods(){
			$manageph_prods = DB::table('ph_products')->select('ph_products.*','product_groups.*','product.id as productID')
                ->Join('product_groups', 'product_groups.id', '=', 'ph_products.role_id')
                ->where('ph_products.role_id', '=','2')->orderBy('ph_products.id','Asc')->get();
	        return view("ph_products.index")->with('manageph_prods', $manageph_prods);

        }*/
/****** Manage ph_products End ******/

      	public function managesupplier(){
          $managesupplier = DB::table('ph_supplier')->orderBy('id','Asc')->get();
    return view("pharmacy/products.supplier")->with('managesupplier',$managesupplier);
        }

        public function manageProducts(){
           $manageproduct = DB::table('ph_products')->select('ph_products.*','ph_category.*','ph_generic.*','ph_companies.*','ph_locations.*','ph_supplier.*','ph_products.id as product_id')
		   
         ->Join('ph_category', 'ph_category.id', '=', 'ph_products.category_id')
	     ->Join('ph_generic',  'ph_generic.id', '=', 'ph_products.generic_id')
         ->Join('ph_companies','ph_companies.id', '=', 'ph_products.company_id')
	     ->Join('ph_locations','ph_locations.id', '=', 'ph_products.location_id')
	     ->Join('ph_supplier', 'ph_supplier.id', '=', 'ph_products.supplier_id')
		 ->orderBy('ph_products.id','Asc')->get();

			  
		$manageminimumstock = DB::table('ph_products')->select('ph_products.*','ph_category.*','ph_generic.*','ph_companies.*','ph_locations.*','ph_supplier.*','ph_products.id as product_id')
		
           ->Join('ph_category', 'ph_category.id', '=', 'ph_products.category_id')
		   ->Join('ph_generic', 'ph_generic.id', '=', 'ph_products.generic_id')
		   ->Join('ph_companies', 'ph_companies.id', '=', 'ph_products.company_id')
		  ->Join('ph_locations', 'ph_locations.id', '=', 'ph_products.location_id')
		   ->Join('ph_supplier', 'ph_supplier.id', '=', 'ph_products.supplier_id')
			  ->orderBy('ph_products.id','Asc')->get();
			  
		$managecategory  = DB::table('ph_category')->orderBy('id','Asc')->get();
		$managegenerics  = DB::table('ph_generic')->orderBy('id','Asc')->get();
		$managepackings  = DB::table('packings')->orderBy('id','Asc')->get();
		$managecompany   = DB::table('ph_companies')->orderBy('id','Asc')->get();
	    $managelocations = DB::table('ph_locations')->orderBy('id','Asc')->get();
		$managesupplier  = DB::table('ph_supplier')->orderBy('id','Asc')->get();
					
   return view("pharmacy/products.index")->with('manageproduct', $manageproduct)->with('managecategory', $managecategory)->with('managecompany', $managecompany)->with('managelocations', $managelocations)->with('managegenerics', $managegenerics)->with('managesupplier', $managesupplier)->with('manageminimumstock', $manageminimumstock)->with('managepackings', $managepackings);
        }

/******   Add ph_prods  Start ******/

                public function addProduct(Request $request){

               $addproduct = DB::table('ph_products')->insert([
                  'product_code'	        =>   $request->product_code,
                  'product_name'	        =>   $request->product_name,
                  'category_id'	            =>   $request->category_id,
                  'generic_id'	            =>   $request->generic_id,
				  'company_id'              =>   $request->company_id,
				  'supplier_id'             =>   $request->supplier_id,
                  'mini_order_qty'          =>   $request->mini_order_qty,
				  'location_id'             =>   $request->location_id,	
                  'packing_id'	            =>   $request->packing_id,
				  'packing_qty'	            =>   $request->packing_qty,
                  'max_dosage'	            =>   $request->max_dosage,
                  'dosage_per_kg'	        =>   $request->dosage_per_kg,
                  'food_interaction'		=>   $request->food_interaction, 
				  'sgst'                    =>   $request->sgst,
				  'cgst'                    =>   $request->cgst,
				  'hsn_code'                =>   $request->hsn_code,
				  'created_at'	            =>	 date('Y-m-d H:i:s'),
                        ]);
                       //Print_r($addproduct);die();

                       return redirect()->back(); 
        }

/****** Add Product End ******/

/****** Edit Product Start ******/

                public function editProduct(Request $request){
					
             $editProduct = DB::table('ph_products')->where('id',$request->id)->update([
			  
                  'product_code'	        =>   $request->product_code,
                  'product_name'	        =>   $request->product_name,
                  'category_id'	            =>   $request->category_id,
                  'generic_id'	            =>   $request->generic_id,
				  'company_id'              =>   $request->company_id,
				  'supplier_id'             =>   $request->supplier_id,
                  'mini_order_qty'          =>   $request->mini_order_qty,
				  'location_id'             =>   $request->location_id,	
                  'packing_id'	            =>   $request->packing_id,
				  'packing_qty'	            =>   $request->packing_qty,
                  'max_dosage'	            =>   $request->max_dosage,
                  'dosage_per_kg'	        =>   $request->dosage_per_kg,
                  'food_interaction'		=>   $request->food_interaction, 
				  'sgst'                    =>   $request->sgst,
				  'cgst'                    =>   $request->cgst,
				  'hsn_code'                =>   $request->hsn_code,
				  'created_at'	            =>	 date('Y-m-d H:i:s'),
                        ]);
            return redirect()->back(); 
        }

/******   Edit Product End ******/

/******   Edit Order Start ******/

                public function Orrder(Request $request){
					
				$Orrder = DB::table('orrder')->insert([
                'product_name'	        =>   $request->product_name,
				'mini_order_qty'        =>   $request->mini_order_qty,
                'order_qty'             =>   $request->order_qty,
                'status'                =>   $request->status,
                ]);
            return redirect()->back(); 
        }

/******   Edit Order End ******/

           public function addSupplier(Request $request){
					
				$addSupplier = DB::table('supplier')->insert([
                'supplier_name'	         =>   $request->supplier_name,
				'contact'                =>   $request->contact,
				'address'                =>   $request->address,
                ]);
            return redirect()->back(); 
        }

          public function editSupplier(Request $request){
					
          $editSupplier = DB::table('supplier')->where('id',$request->id)->update([
			  
                'supplier_name'	        =>   $request->supplier_name,
                'contact'	            =>   $request->contact,
                'address'	            =>   $request->address,
                        ]);
            return redirect()->back(); 
        }

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
