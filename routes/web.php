<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::any('{query}', function() { return view('404'); })->where('query', '.*');

Route::fallback(function () {
    return view("404");
}); 
Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', 'App\Http\Controllers\AdminController@login');
Route::post('/checkLogin', 'App\Http\Controllers\AdminController@checkLogin');
Route::get('/logout', 'App\Http\Controllers\AdminController@logout');

Route::get('/not_allowed', 'App\Http\Controllers\CommonController@notAllowed');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@dashboard');
    Route::post('/add_roles', 'App\Http\Controllers\RolesController@addManageRolesAction');
    Route::get('/permissions/{id}', 'App\Http\Controllers\RolesController@managePermissions');
    
    Route::get('/users', 'App\Http\Controllers\UsersController@manageUsers');
    Route::post('/add_user', 'App\Http\Controllers\UsersController@addUser');
    Route::post('/edit_user', 'App\Http\Controllers\UsersController@editUser');
    Route::post('/delete_user', 'App\Http\Controllers\UsersController@deleteUser');
    Route::post('/checkemail', 'App\Http\Controllers\UsersController@checkemail');
    
    Route::get('/users/attendance/{id}', 'App\Http\Controllers\UsersController@usersAttendance');

    Route::get('/users/permissions', 'App\Http\Controllers\PermissionsController@manageusers');
    Route::get('/userrole', 'App\Http\Controllers\PermissionsController@userrole');
    Route::post('/roles', 'App\Http\Controllers\PermissionsController@roles');
    Route::post('/addroles', 'App\Http\Controllers\PermissionsController@addRoles');

    Route::get('/patients', 'App\Http\Controllers\PatientsController@managePatients'); 
    Route::get('/doctorpatient', 'App\Http\Controllers\PatientsController@doctorPatients'); 
    Route::post('/add_patient', 'App\Http\Controllers\PatientsController@addPatient');
    Route::post('/edit_patient', 'App\Http\Controllers\PatientsController@editPatient');
    Route::post('/delete_patient', 'App\Http\Controllers\PatientsController@deletePatient');
    Route::POST('/gettaluk', 'App\Http\Controllers\PatientsController@gettaluk'); 
    Route::POST('/getpanchayath', 'App\Http\Controllers\PatientsController@getpanchayath'); 
    Route::POST('/getroom', 'App\Http\Controllers\PatientsController@getrooms'); 
    Route::POST('/getbed', 'App\Http\Controllers\PatientsController@getbeds'); 

    Route::get('/blocks', 'App\Http\Controllers\BlocksController@manageBlocks');
    Route::post('/add_block', 'App\Http\Controllers\BlocksController@addBlock');
    Route::post('/edit_block', 'App\Http\Controllers\BlocksController@editBlock');
    Route::get('/rooms/{id}', 'App\Http\Controllers\BlocksController@manageRoom');
    Route::post('/edit_room', 'App\Http\Controllers\BlocksController@editRoom');
    Route::post('/add_room', 'App\Http\Controllers\BlocksController@addRoom');
    Route::get('/beds/{id}', 'App\Http\Controllers\BlocksController@manageBeds');

    Route::get('/disease', 'App\Http\Controllers\PatientsController@manageDisease');
    Route::post('/nurse', 'App\Http\Controllers\UsersController@manageNurse');

//Pharmacy//
    Route::get('/pharmacy/products', 'App\Http\Controllers\ProductsController@manageProducts');
    Route::post('/pharmacy/add_product', 'App\Http\Controllers\ProductsController@addProduct');
    Route::post('/pharmacy/edit_product', 'App\Http\Controllers\ProductsController@editProduct');

//category//
    Route::get('pharmacy/category', 'App\Http\Controllers\PharmacyCoController@manageCategory');
    Route::post('pharmacy/add_category', 'App\Http\Controllers\PharmacyCoController@addCategory');

//generics//    
    Route::get('pharmacy/generics', 'App\Http\Controllers\PharmacyCoController@manageGenerics');
    Route::post('pharmacy/add_generics', 'App\Http\Controllers\PharmacyCoController@addgenerics');

//packings//
    Route::get('pharmacy/packings',   'App\Http\Controllers\PharmacyCoController@managePackings');
    Route::post('pharmacy/add_packings', 'App\Http\Controllers\PharmacyCoController@addpackings');

//medicines//
    Route::get('pharmacy/medicines', 'App\Http\Controllers\PharmacyCoController@manageMedicines');
    Route::post('pharmacy/add_medicines', 'App\Http\Controllers\PharmacyCoController@addmedicines');

//company//
    Route::get('/pharmacy/company', 'App\Http\Controllers\PharmacyCoController@manageCompany');
    Route::post('pharmacy/add_company', 'App\Http\Controllers\PharmacyCoController@addCompany');

//supplier//     
    Route::get('/pharmacy/supplier', 'App\Http\Controllers\PharmacyCoController@manageSupplier');
    Route::post('pharmacy/add_supplier', 'App\Http\Controllers\PharmacyCoController@addSupplier');

//locations//
    Route::get('/pharmacy/locations', 'App\Http\Controllers\PharmacyCoController@manageLocations');
    Route::post('pharmacy/add_locations', 'App\Http\Controllers\PharmacyCoController@addLocations');
    Route::post('/pharmacy/edit_locations', 'App\Http\Controllers\ProductsController@editLocations');






    Route::get('/appointments', 'App\Http\Controllers\AppointmentsController@manageAppointments');
    Route::get('/calandar_data', 'App\Http\Controllers\AppointmentsController@calandarData');
    Route::post('/add_event', 'App\Http\Controllers\AppointmentsController@addEvent');
    Route::get('/edit_event/{id}', 'App\Http\Controllers\AppointmentsController@editEvent');
    Route::post('/update_event', 'App\Http\Controllers\AppointmentsController@updateEvent');

    Route::get('/reminder', 'App\Http\Controllers\CommonController@reminder');
    Route::get('/calandar_data', 'App\Http\Controllers\CommonController@calandarData');
    Route::post('/add_event', 'App\Http\Controllers\CommonController@addEvent');
    Route::get('/edit_event/{id}', 'App\Http\Controllers\CommonController@editEvent');
    Route::post('/update_event', 'App\Http\Controllers\CommonController@updateEvent');
    Route::post('/delete_event', 'App\Http\Controllers\CommonController@deleteEvent');








    
});


