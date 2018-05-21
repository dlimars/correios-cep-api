<?php

namespace App\Http\Middleware;

use Closure;
use App\Entities\Site;

class Cors
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
        $requestHost = explode(':', $request->getHttpHost());
        $sites = Site::select('domain')->get()->toArray();

        $result = array_search($requestHost[0], array_column($sites, 'domain'));

        if($result !== false){
            header("Access-Control-Allow-Origin: " . $requestHost[0] );
        } else {
            return response('Unauthorized.', 401);
        }
        
        return $next($request);
    }
}
