<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::check()){
            //admin
            if(Auth::user()->account_type == 'user'){

                return $next($request);
            }else{
                alert()->error('No Access!')->showConfirmButton()->buttonsStyling(true);

                return redirect()->back();

            }
        }else{
   
           

            return view('auth/login');


        }
        return $next($request);
    }
}
