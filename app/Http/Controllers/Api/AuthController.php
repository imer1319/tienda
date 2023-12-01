<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function actualizarPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::find($request->user_id);
        $user->password = $request->password;
        $user->save();

        return response()->json(['message' => 'Contraseña actualizada con éxito'], 200);
    }

    public function actualizarDatosUsuario(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->user_id, // Asegura que el email sea único excepto para el usuario actual
            'ci' => 'required|string|max:255',
            'phone' => 'required|numeric',
        ]);

        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $user->profile()->update([
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'ci' => $request->ci,
            'phone' => $request->phone,
        ]);

        return response()->json(['message' => 'Datos actualizados con éxito'], 200);
    }
}
