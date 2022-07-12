<?php

namespace App\Http\Middleware;

use App\Models\UniqueToken;
use Closure;
use Illuminate\Http\Request;

class LinkTokenMiddleware
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
        $token = $request->route('token');
        if ( !$request->hasValidSignature() || !UniqueToken::isTokenValid($token)) {
            abort(403);
        }
        return $next($request);
    }
}
