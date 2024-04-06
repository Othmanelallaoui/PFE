<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthenticateEmployee
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('employee')->check()) {
            // Rediriger vers la méthode showLoginForm() du contrôleur EmployeeController
            return redirect()->route('employee.login');
        }

        return $next($request);
    }
}