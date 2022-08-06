<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\TokenModel;
use Illuminate\Http\Request;

class APIAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');
        if($token)
        {
            $key = Token::where('token_key',$token)
                                ->whereNull('expired_at')->first();
            if($key) return $next($request);
            return response()->json(['message'=>'Supplied Token is invalid or expired'],401);
        }
        return response()->json(['message'=>'No Token Provided']);
    }
}
