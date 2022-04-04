<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Console\Migrations\RollbackCommand;
use Illuminate\Http\Request;

class CheckUserLoginMiddleware
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
        if($request->session()->exists('user_id')){
            return redirect()->route('homepage');
        }else{
            return $next($request);
        }
    }
}
