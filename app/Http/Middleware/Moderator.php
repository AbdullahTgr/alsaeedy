<?php

namespace App\Http\Middleware;

use Closure;

class Moderator
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
        if($request->user()->role=='moderator'){
            return $next($request);
        }
        else{
            request()->session()->flash('error','You do not have any rights to access this page');
            return redirect()->back();
        } 
    }
}
 