<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
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
        if (!Session()->has('farmer') && !Session()->has('vendor') && !Session()->has('admin') ) {
            Session(['url.intended' => $request->url()]);

            return redirect('/login')->with('error', 'You have to log in first.');
        }
        return $next($request);
    }
}
