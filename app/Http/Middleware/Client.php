<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Client
{

    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user->isClient() && !$user->validate) {

            return redirect()->route('toValidate');
        }

        return $next($request);
    }
}
