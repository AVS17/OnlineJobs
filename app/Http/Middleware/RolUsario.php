<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolUsario
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
        if($request->user()->role === 1){
            //En caso de que no sea el rol 2, redireccionar al usuario a home
            return redirect()->route('home');
        }
        return $next($request);
    }
}
