<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsActive
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if ($user && !$user->aktif) {
            auth()->logout();
            return redirect()->route('login')->withErrors([
                'login' => 'Akun Anda nonaktif. Hubungi administrator.',
            ]);
        }
        return $next($request);
    }
}
