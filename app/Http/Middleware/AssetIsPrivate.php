<?php

namespace App\Http\Middleware;

use Str;
use Closure;
use Illuminate\Http\Request;

class AssetIsPrivate
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
        if (Str::startsWith($request->header('referer'), $this->getHost($request))) {
            return $next($request);
        }

        abort(404);
    }

    /**
     * Get application host url.
     *
     * @param Request $request
     * @return string
     */
    private function getHost(Request $request)
    {
        return ($request->secure() ? 'https://' : 'http://') . $request->getHost();
    }
}
