<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class CheckUserMiddleware
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
        $sessionUser = $request->session()->get('user_data');
        if (!is_null($sessionUser)) {
            return $next($request);
        }
        else{
            return redirect('/')->with('error','please login first');
        }
    }
}
