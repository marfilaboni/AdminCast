<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Superadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
      if(Auth::user()->user_role_id!=1){
        return redirect('admin/access');
      }
        return $next($request);
    }
}
