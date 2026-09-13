<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateLastSeen
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {


            /** @var \App\Models\User $user */
            $user = Auth::user();

            // supaya tidak nulis ke database di SETIAP request,
            // hanya update kalau sudah lebih dari 60 detik sejak update terakhir
            if (! $user->last_seen_at || $user->last_seen_at->diffInSeconds(now()) > 60) {
                $user->update(['last_seen_at' => now()]);
            }

        }

        return $next($request);
    }
}
