<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function register(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|string|min:8'
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password)
    ]);

    return response()->json([
      'message' => 'Usuario registrado correctamente',
      'user' => $user
    ], 201);
  }

  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|string'
    ]);
    $user = User::where('email', $request->email)->first();
    if (!$user || !Hash::check($request->password, $user->password)) {
      return response()->json([
        'message' => 'Credenciales incorrectas'
      ], 401);
    }
    $token = bin2hex(random_bytes(40));
    $user->remember_token = $token;
    $user->save();
    return response()->json([
      'message' => 'Login exitoso',
      'user' => $user,
      'token' => $token
    ], 200);
  }

  public function profile(Request $request)
    {
        $user = $request->attributes->get('user');

        return response()->json($user);
    }

}
