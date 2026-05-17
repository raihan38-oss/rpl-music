<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        $request->validate ([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            // 'role',
            // 'profile_pict'
        ]);

        genres::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'test',
            'profile_pict' => 'test'
        ]);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password
    ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user->delete(); 
        return redirect()->route('user.index');
    }
}
