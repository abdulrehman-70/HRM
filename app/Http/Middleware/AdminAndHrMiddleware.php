<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAndHrMiddleware
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
            $user = User::where('id',Auth::User()->id)->first();
            $role = $user->getRoleNames();

            if(in_array("admin", $role->toArray()) || in_array("hr", $role->toArray())){
               return $next($request);
            }
            else{
               return redirect('user/dashboard');
            }
        }
    }