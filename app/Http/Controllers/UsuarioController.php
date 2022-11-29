<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function login(Request $request) {

        if ($request->get('boton', '') === 'Login') {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect('/',302,['razon'=>'ok']);
            }
            return back(302,['razon'=>'fallo'])->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
        return view("login");
    }
    public function ingreso(Request $request) {
        return view('ingreso');
    }
    public function listado(Request $request) {
        return view('ingreso');
    }
}
