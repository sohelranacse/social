<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Closure , Auth;
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'login'
    ];

    public function handle($request, Closure $next)
    {
        if(!Auth::check() && $request->route()->named('logout')) {
        
            $this->except[] = route('logout');
            
        }
        
        return parent::handle($request, $next);
    }
}
