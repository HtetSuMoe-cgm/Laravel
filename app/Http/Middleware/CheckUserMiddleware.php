<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserMiddleware
{
    /**
     * Handle an incoming request.
     *do
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $routedUserId = $request->route('id');
        $loginUserId = Auth::id();
        if (Auth::check() && ($routedUserId == $loginUserId)) {
            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}
