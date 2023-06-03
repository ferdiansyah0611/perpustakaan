<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
	public function signin()
	{
		$title = 'Sign In';
		return view('auth.login', compact('title'));
	}

	public function signup()
	{
		$title = 'Sign Up';
		return view('auth.register', compact('title'));
	}

	public function login(Request $request)
	{
		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {
			return redirect()->intended('/dashboard');
		} else {
			return redirect()->back()->withInput()->withErrors(['email' => 'Email atau password salah']);
		}
	}
	public function register(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:8|confirmed',
		]);

		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'role' => 'user',
			'password' => Hash::make($request->password),
		]);

		Auth::login($user);

		return redirect()->intended('/dashboard');
	}

	public function logout()
	{
		Auth::logout();

		return redirect()->route('signin');
	}
}