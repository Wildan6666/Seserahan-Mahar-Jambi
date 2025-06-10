<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
{
    $users = User::paginate(10);
    return view('admin.usermanajemen', compact('users'));
}

// UserController.php
public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'role' => 'required|in:admin,user',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
    ]);

    return redirect()->route('admin.usermanajemen')->with('success', 'User berhasil diperbarui.');
}


public function destroy(User $user)
{
    $user->delete();
    return redirect()->route('admin.usermanajemen')->with('success', 'User berhasil dihapus.');
}}