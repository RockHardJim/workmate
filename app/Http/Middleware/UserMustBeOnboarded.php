<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMustBeOnboarded
{
    protected $ignore = [
        'company.welcome',
        'company.join',
        'company.onboard',
        'company.create',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->isOnboarded()) {
            return $next($request);
        }

        if (in_array($request->route()->getName(), $this->ignore)) {
            return $next($request);
        }

        return redirect()->route('company.welcome');
    }
}
