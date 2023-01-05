<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin_Auth
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
        if ($request->session()->has('Admin_login')) {
            
        }
        else{
            // $request->session('error','Invalid credentials');
            return redirect('/admin')->with(session('error','Invalid credentials'));
        }
        return $next($request); 
    }
}
