<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class ComprobarAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) //Esta función compruebo primero que el usuario está en la base y luego si es admin.
    {
        if(auth()->check())
        {
            if(auth()->user()->idCategoriaFK == 1)
            {    
                return $next($request);                
            }
            
        }
        return redirect()->to('/miBoda'); //Redirigo a la pagina principal
    }
}
