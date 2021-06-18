<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
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
        if (Auth::check() && Auth::user()->status)
        {
            $banned = Auth::user()->status == "1";
            Auth::logout();

            if ($banned == 1)
            {
                $message = "Your account has been banned, Please contact administrator";
            }
            return redirect()->route('login')
                ->with('status',$message)
                ->withErrors(['email'=>'Your account has been banned']);
        }
                return $next($request);
    }
}
