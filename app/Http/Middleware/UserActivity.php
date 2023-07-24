<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserActivity
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
        $user = Auth::user();
        $user->lastActive = \Carbon\Carbon::now();
        $user->save();

        if(Auth::check()){
            $expiresat = Carbon::now()->addMinutes(5);
            Cache::put('user-is-online-'.Auth::user()->id,true,$expiresat);
        }

        return $next($request);
    }
}
