<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class AuthMiddleware
{
    public function handle($request, Closure $next)
    {
        $authorization = $request->header('Authorization');
        if (!$authorization) {
            return response()->json(['message' => 'No autorizado'], 401);
        }
        if (!str_starts_with($authorization, 'Bearer ')) {
            return response()->json(['message' => 'Formato de token inválido'], 401);
        }
        $token = str_replace('Bearer ', '', $authorization);
        $user = User::where('remember_token', $token)->first();
        if (!$user) {
            return response()->json(['message' => 'Token inválido'], 401);
        }
        $request->attributes->set('user', $user);
        return $next($request);
    }
}
