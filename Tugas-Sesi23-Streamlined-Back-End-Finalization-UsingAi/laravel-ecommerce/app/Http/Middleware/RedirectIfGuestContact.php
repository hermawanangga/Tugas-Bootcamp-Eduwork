<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfGuestContact
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()) {

            return redirect()
                ->guest(route('login'))
                ->with('warning', 'Silakan login terlebih dahulu untuk mengirim pesan melalui halaman Contact.');

        }

        return $next($request);
    }
}