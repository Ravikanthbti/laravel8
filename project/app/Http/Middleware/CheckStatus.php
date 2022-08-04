<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class CheckStatus
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
        $a=34;
        $b=23;
        if ($a >$b) {
            return $next($request);
        }
        return response()->json('false statement');

        
    }
        
       

    
}
