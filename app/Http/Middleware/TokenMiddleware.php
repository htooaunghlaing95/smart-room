<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class TokenMiddleware
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
        if($request->has('token')){
            $user = User::where('token', $request->input('token'))->first();
            if($user){
                return $next($request);
            }

            return response()->json([
                'status' => 'Fail',
                'message' => 'Token key is expired'
            ]);
        }

        return response()->json([
            'status' => 'Fail',
            'message' => 'Token key is required'
        ]);
    }
}
