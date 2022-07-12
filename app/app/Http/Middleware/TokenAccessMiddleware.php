<?php

namespace App\Http\Middleware;

use App\Models\UniqueToken;
use Closure;
use Illuminate\Http\Request;

class TokenAccessMiddleware
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

        if ( !session()->get('tokenAccess' )) {
            abort(403);
        }
        return $next($request);
    }
}
