<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class UserCompleted
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
    	$user=Auth::guard('web')->user();

	    if (!$user->confirmed)
	    {
		    return redirect('/user/confirmation/');
	    }

	    return $next($request);
    }
}
