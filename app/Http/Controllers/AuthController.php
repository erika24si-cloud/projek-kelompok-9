<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\warga;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
       if (Auth::check()) {
             return redirect()->route('warga.index');
         }
		    return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email'    => 'required|email',
        ]);

        $warga = warga::where('email', $request->email)
              ->where('nama', $request->nama) 
              ->first();
        if ($warga) {
            Auth::login($warga);
            session(['last_login' => now()]);

            return redirect()->route('warga.index')->with('success', 'Login berhasil!');
        } else {
            return back()->withErrors(['email' => 'Nama atau email salah'])->withInput();
        }
}

public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth');
    }
    
}
