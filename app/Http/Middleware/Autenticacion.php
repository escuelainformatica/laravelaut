<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\Exceptions\MissingAbilityException;

class Autenticacion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,...$permisos)
    {
        /** @var \Illuminate\Database\Eloquent\Collection $permisoUsuario */
        $permisoUsuario=$request->user()->getDirectPermissions()->toArray();
        //var_dump($permisoUsuario);
        /*if(in_array($permisos[0],$permisoUsuario) $permisoUsuario->contains($permisos[0])) {
            return $next($request);
        }*/
        throw new MissingAbilityException("","No tiene permisos para hacer la operacion");
    }
}
