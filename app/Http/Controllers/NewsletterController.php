<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;

class NewsletterController extends Controller
{
	public function __invoke(Newsletter $newsletter)
	{
		request()->validate(['email'=>'required|email']);

		try
		{
			$newsletter->subscribe(request('email'));
		}
		catch(\Exception $e)
		{
			throw \Illuminate\Validation\ValidationException::withMessages([
				'email'=> 'this email could not be added to list!',
			]);
		}

		return redirect('/')->with('success', 'you are singed up for newsletter');
	}
}
