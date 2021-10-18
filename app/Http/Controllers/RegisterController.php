<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index() {
        return view('users.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'unique:users', 'email:rfc,dns'],
            'username' => ['required', 'max:16', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()]
        ]);
        
        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);
        return redirect('login')->with('registerSuccess', 'Registration successfull! Please login.');
    }
}
