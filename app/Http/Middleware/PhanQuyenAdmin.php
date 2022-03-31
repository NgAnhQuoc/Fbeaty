<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhanQuyenAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check())
        {
            $user=Auth::user();
            if (($user->role==1 or $user->role==0) and $user->active==1 and $user->trangthai==1)
            {
                return $next($request);
            }
            else{
                return redirect('/quantri/login')->with('thongbao', 'Bạn không phải là ADMIN');;
            }
        }else{
            return redirect('/quantri/login');
        }

    }
}
