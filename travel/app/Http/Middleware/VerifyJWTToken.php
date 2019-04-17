<?php

namespace App\Http\Middleware;

use Closure;

class VerifyJWTToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $jwt = @trim(explode(' ', $request->header('Authorization'))[1]);
        $request->jwtToken = $jwt;
        $request->jwtUser = new \stdClass();
        if (empty($jwt)) {
            return response()->json([
                'code' => 401,
                'is_validate' => 1,
                'msg' => __('auth.check_jwt_empty'),
                'data' => []
            ]);
        } else {
            try {
                $request->jwtUser = jwtdecode($jwt, array('HS256'));
                $locale = @$request->jwtUser->lang ?: 'vi';
                app()->setLocale($locale);
            } catch (\Exception $e) {
                return response()->json([
                    'code' => 401,
                    'is_validate' => 1,
                    'msg' => __('auth.check_jwt_fail'),
                    'data' => []
                ]);
            }
            return $next($request);
        }
    }
}
