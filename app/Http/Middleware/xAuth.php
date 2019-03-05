<?php

namespace App\Http\Middleware;

use Closure;

class xAuth
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
        $user=$request->session()->get('user',null);
        if($user==null){
            return redirect(route('login'));
        }else {
            return $next($request);
        }
    }
}
