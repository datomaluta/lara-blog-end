<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException as ValidationValidationException;

class SessionsController extends Controller
{
	public function create()
	{
		return view('sessions.create');
	}

	public function store()
	{
		
		$attributes = request()->validate([
			'email'   => 'required|email',
			'password'=> 'required',
		]);

		if (!auth()->attempt($attributes))
		{
			throw ValidationValidationException::withMessages([
				'email'=> 'Your provided credentials not be verified.',
			]);
		}

		session()->regenerate();

		return redirect('')->with('success', 'welcome');
	}

	public function destroy()
	{
		auth()->logout();

		return redirect('/')->with('success', 'Goodbye');
	}
}
