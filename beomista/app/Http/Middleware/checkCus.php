<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkCus
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
        if(session()->has('name')){
          
        }else{
           
            return redirect()->route('home.cart')->with('errorsCus','Bạn cần đăng nhập trước khi đặt hàng');
        }
        return $next($request);
    }
}
