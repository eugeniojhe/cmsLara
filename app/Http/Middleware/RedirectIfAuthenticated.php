<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
       
        /*Eugenio - 11/05/2020 Versão original comentada, 
            para acompanhar conforme a padrão 
            do cms que esta se desenvolvendo 
        */
        /*  if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request); */

        //New Code 
        if (Auth::guard($guard)->check()){
            return redirect()->route('admin'); 
        }
        return $next($request);


    }
}
