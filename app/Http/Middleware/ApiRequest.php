<?php

namespace App\Http\Middleware;

use App\Models\LimitRequest;
use Closure;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class ApiRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $limit = 1)
    {

        $limitRequest = LimitRequest::where([
            'ip' => $request->ip(),
            'route' => $request->route()->uri,
        ])->first();

        if ($limitRequest){

            if ($limitRequest->count >= $limit){

                $limitRequest->update([
                    'count' => 0
                ]);
                return  response(['status' => 'error', 'message' => 'Limit exceeded']);
            }

            $limitRequest->update([
                'count' => $limitRequest->count + 1
            ]);

        }else{

            LimitRequest::create([
                'ip' => $request->ip(),
                'route' => $request->route()->uri,
                'count' => 1
            ]);
        }


        return $next($request);
    }
}
