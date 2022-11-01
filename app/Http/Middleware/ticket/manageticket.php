<?php

namespace App\Http\Middleware\ticket;

use Closure;
use DB;
use Auth;

class manageticket
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
                 ->where('manage_ticket',1)
                 ->first();
        if($check == null){
          return  redirect('not_allowed');
        }else{
          return $next($request);
        }
    }
}
