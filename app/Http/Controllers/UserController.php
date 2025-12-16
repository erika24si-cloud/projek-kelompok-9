<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
       $search = $request->get('search');
        
        $query = User::query();
        
        if ($search) {
            $query->where('name', 'like', '%'.$search.'%')
                  ->orWhere('email', 'like', '%'.$search.'%');
        }

        $users = $query->orderBy('name', 'asc')->paginate(10);
        
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // --- 1. TAMBAH VALIDASI ---
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => ['required', Rule::in(['admin', 'operator', 'viewer'])],
        ]);

        $data['name'] = $request->name;
        $data['role'] = $request->role;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password); 

        User::create($data);

        return redirect()->route('user.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('user.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $users = User::findOrFail($id);
        return view('user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $user = User::findOrFail($id);
        
        // --- 2. TAMBAH VALIDASI UPDATE ---
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)], 
            'password' => 'nullable|string|min:8|confirmed', // 'nullable' karena opsional
            'role' => ['required', Rule::in(['admin', 'operator', 'viewer'])],
        ]);

        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password); 
        }

        $user->save();
        return redirect()->route('user.index')->with('success', 'Perubahan Data Berhasil!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Hapus Data Berhasil!');
    }
}
