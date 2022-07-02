<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class admin_panel
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
        // if(session()->has('admin_panel') )
        // {
        //     return $next($request);
        // }
        // else{
        //     return back();
        // }
        
    //     if (Auth::user() &&  Auth::user()->type == 'admin') {
    //         return $next($request);
    //    }

    //    return redirect('/')->with('error','You have not admin access');

    // if (Auth::user()->type == 'admin'){
    //     return $next($request);
    //   } else {
    //     return redirect('/')->with('error','You have not admin access');
    //   }
    // }
    if($request->session()->get('type') === 'admin') {
        return $next($request);
    } else {
        return redirect('/')->with('error','You have not admin access');
    }
    // if($request->user->type !== 'admin' && $request->user->type !== 'moderator') {
    //     return response()->json(['error' => 'Access denied'], 400);
    // }
    // return $next($request);
    }
}