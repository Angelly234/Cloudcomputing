<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlreadyLoggedIn
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
       // Check if the user is already logged in and trying to access the login or registration page
       // If so, redirect them back to the previous page
       if(Session()->has('loginId')&&(url('')==$request->url() || url('registration')==$request->url())){
        return back();
       }
       // If the user is not logged in or is trying to access a different page,
       // continue with the request and pass it to the next middleware or route handler
       return $next($request);
    }

}
