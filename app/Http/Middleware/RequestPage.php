<?php

namespace App\Http\Middleware;

use Closure;

class RequestPage
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
        if(\Cookie::get('request')!=true){
            return redirect(route('request.page'));
        }else{
            return $next($request);
        }
    }
}
