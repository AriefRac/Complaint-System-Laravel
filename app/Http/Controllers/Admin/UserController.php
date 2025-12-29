<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique',
            'role' => 'required',
            'password' => 'required',
            'telephone' => 'required|unique',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,
            'telephone' => $request->telephone,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dibuat!');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique',
            'role' => 'required',
            'password' => 'required',
            'telephone' => 'required|unique',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,
            'telephone' => $request->telephone,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
