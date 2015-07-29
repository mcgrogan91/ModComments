<?php

namespace App\Http\Middleware;

use Closure;
use Request;
use Validator;

class HostMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if($this->verifyReferrer(Request::server('HTTP_REFERER')))
          return $next($request);

        throw new \Exception("WE DON'T LIKE ODD REMOTE PORTS");
    }

    private function verifyReferrer($referrer)
    {
        $match = preg_match("/(http:\/\/tagpro-((origin)|(pi)|(centra)|(sphere)|(radius)|(segment)|(orbit)|(arc)|(chord)|(diameter)|(maptest)))\.koalabeast\.com\/moderate\/((users)|(ips))\/.+|(http:\/\/tangent\.jukejuice.com\/moderate\/((users)|(ips))\/.+)/",
          $referrer);

        return $match;
    }
}
