<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    public function handle(Request $request, Closure $next, $tipo)
    {
        if (Auth::check() && Auth::user()->tipo === $tipo) {
            return $next($request);
        }
        
        // Redirigir según el tipo de usuario autenticado
        if (Auth::check()) {
            if (Auth::user()->tipo === 'cliente') {
                return redirect()->route('cliente.dashboard');
            } elseif (Auth::user()->tipo === 'supervisor') {
                return redirect()->route('supervisor.dashboard');
            } else {
                return redirect()->route('admin.dashboard');
            }
        }
        
        return redirect()->route('auth.login');
    }
}