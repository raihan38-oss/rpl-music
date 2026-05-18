<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'role' => 'user', 
            'profile_pict' => 'test' 
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user) 
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(User $kelola_user)
    {
        return view('user.edit', ['user' => $kelola_user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $kelola_user) 
    {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $kelola_user->id,
        'password' => 'nullable|min:6'
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
    ];

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    $kelola_user->update($data);

    return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) 
    {
        $user->delete(); 
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}