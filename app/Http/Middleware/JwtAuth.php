<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JwtAuth
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            \Tymon\JWTAuth\Facades\JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['message' => 'Token is Invalid'],401);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['message' => 'Token is Expired'],401);
            }else{
                return response()->json(['message' => 'Authorization Token not found'],401);
            }
        }
        return $next($request);
    }
}
