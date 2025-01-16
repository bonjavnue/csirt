<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Redirect ke halaman login jika belum login
            return redirect()->route('/')->with('error', 'Silakan login terlebih dahulu.'); // route nanti diganti ke login admin
        }

        return $next($request); // lanjut kalau sudah login
    }
}