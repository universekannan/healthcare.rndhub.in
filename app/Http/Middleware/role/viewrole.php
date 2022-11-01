<?php

namespace App\Http\Middleware\role;

use Closure;
use DB;
use Auth;

class viewrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $check =  DB::table('user_permission')
                 ->where('user_types_id',Auth()->user()->role_id)
                 ->where('add_roles',1)
                 ->first();
        if($check == null){
          return  redirect('not_allowed');
        }else{
          return $next($request);
        }
    }
}
