<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarRol
{
    public function handle(Request $request, Closure $next, string $rol): Response
    {
        // Verificar si el usuario inició sesión
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Verificar si tiene el rol requerido
        if (auth()->user()->rol != $rol) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }

        // Permitir continuar
        return $next($request);
    }
}