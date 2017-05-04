<?php

namespace App\Http\Middleware;

use Closure;

class CheckHomeUser
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
        if(session()->exists('homeuser')){
            
            return $next($request);
        }else{
            session(['nowaddress' => $_SERVER['HTTP_REFERER']]);
            return redirect('/home/login/inx')->with('msg','请先登录');
        }
        
    }
}
