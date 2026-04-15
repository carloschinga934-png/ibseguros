<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
   public function index()
   {
      return view('auth.register');
   }

   public function register(Request $request)
   {
      $request->validate([
         'tipo' => 'required|in:cliente,supervisor',
         'dni' => 'required|string|size:8|unique:users',
         'nombres' => 'required|string|max:255',
         'apellidos' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:8|confirmed',
         'telefono' => 'required|string|size:9',
      ]);

      $user = User::create([
         'name' => $request->nombres . ' ' . $request->apellidos,
         'email' => $request->email,
         'password' => Hash::make($request->password),
         'dni' => $request->dni,
         'tipo' => $request->tipo,
         'telefono' => $request->telefono,
      ]);

      Auth::login($user);

      // Redirigir según el tipo de usuario
      if ($user->tipo === 'cliente') {
         return redirect()->route('cliente.dashboard');
      } elseif ($user->tipo === 'supervisor') {
         return redirect()->route('supervisor.dashboard');
      } else {
         return redirect()->route('admin.dashboard');
      }
   }
}
