<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
       if (Auth::check()) {
             return redirect()->route('user.index');
         }
		    return view('auth.login');
    }

    public function login(Request $request)
    {
       $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            session(['last_login' => now()]);

            return redirect()->route('user.index')->with('success', 'Login berhasil!');
        } else {
            return back()->withErrors(['email' => 'Email atau password salah'])->withInput();
        }
}

public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth');
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('user.index');
        }
        return view('auth.register'); 
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed',
            'role' => 'required'
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'profile'  => 'https://ui-avatars.com/api/?name=' . urlencode($request->name) . '&background=random&color=fff',
        ]);

        Auth::login($user);
        session(['last_login' => now()]);

        return redirect()->route('user.index')->with('success', 'Akun berhasil dibuat!');
    }
}