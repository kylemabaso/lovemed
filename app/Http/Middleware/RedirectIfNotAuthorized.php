<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAuthorized
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $user = auth()->user();
            if ($user->hasRole('Kratos')) {
                return redirect()->route('pages.dashboard.main');
            } elseif ($user->hasRole('Admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('Patient')) {
                return redirect()->route('patient.dashboard');
            } elseif ($user->hasRole('Doctor')) {
                return redirect()->route('doctor.dashboard');
            } elseif ($user->hasRole('Pharmacist')) {
                return redirect()->route('pharmacist.dashboard');
            }
        }

        return $next($request);
    }
}
