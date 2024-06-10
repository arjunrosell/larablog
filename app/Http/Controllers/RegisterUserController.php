<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Doctrine\Inflector\Rules\English\Rules;

class RegisterUserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required','max:255','min:2','string',
            'email' => 'required|email|unique:users',
            'password' => ['required','min:8','confirmed', Password::defaults()],
        ]);

        //create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->login($user);

        return to_route('posts.index');
    }
}
