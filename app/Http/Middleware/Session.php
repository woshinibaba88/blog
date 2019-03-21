<?php

namespace App\Http\Middleware;

use Closure;

class Session
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
        $id=session("user_id");
        //dd($id);die;
        if(empty($id)){
            return redirect("user/login");
        }
        return $next($request);
    }
}
