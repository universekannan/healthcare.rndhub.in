<?php
namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
use App\Http\Controllers\AdminControllers\SiteSettingController;

class Ticket extends Model
{
	 public function paginator(){
	 	$product = DB::table('tickets_products')->paginate(50);
           return ($product);
	 }
	 public function insert_product($product_name,$date_added,$status)
	 {
	 	 $product = DB::table('tickets_products')->insertGetId([
            'product_name' =>   $product_name,
            'status'  	   =>   $status,
            'created_at' =>	  $date_added,
            'updated_at' =>   $date_added
        ]);
        return $product;
	 }

	 public function edit_product($id)
	 {
	 	$product = DB::table('tickets_products')
            ->select('tickets_products.*')
            ->where('tickets_products.id', $id)->first();
        return $product;
	 }

	 public function update_product($product_name,$last_modified,$status,$update_id)
	 {
	 	$product =  DB::table('tickets_products')->where('id','=',$update_id)->update([
             'product_name' =>  $product_name,
             'status' => $status,
             'updated_at' => $last_modified
         ]);
        return $product;
	 }
	 public function delete_product($request)
	 {
	 	$id = $request->id;
        //print_r($member_id);die();
        DB::table('tickets_products')->where('id', $id)->delete();
	 }

	 public function open_tickets()
	 {
	 	$open_tickets = DB::table('tickets') ->orderByDesc('id')->where('status', '=', 1)->paginate(50);
	 	return $open_tickets;
	 }

	 public function answered_tickets()
	 {
	 	  $answered_tickets = DB::table('tickets') ->orderByDesc('id')->where('status', '=', 2)->paginate(50);
	 	  return $answered_tickets;
	 }

	 public function closed_tickets()
	 {
	 	   $closed_tickets = DB::table('tickets') ->orderByDesc('id')->where('status', '=', 3)->paginate(50);
	 	  return $closed_tickets;
	 }

}
?>