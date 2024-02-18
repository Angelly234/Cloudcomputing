<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBanned
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
        if (auth()->guard('web')->check() && auth()->guard('web')->user()->ban == 1) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('user.login')->with('error', 'Your user account has been suspended. Please contact the administrator.');
        } elseif (auth()->guard('scholar')->check() && auth()->guard('scholar')->user()->ban == 1) {
            Auth::guard('scholar')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('scholar.login')->with('scholarError', 'Your scholar account has been suspended. Please contact the administrator.');
        }
        
        return $next($request);
        
    }
}
