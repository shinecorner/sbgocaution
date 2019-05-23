<?php

namespace App\Http\Middleware;

use Closure;

class PerPagePagination
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
        if(!$request->has('per_page')){
            $request->per_page = config('crm.items_per_page');
        }

        return $next($request);
    }
}
