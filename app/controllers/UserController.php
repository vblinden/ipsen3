<?php

class UserController extends BaseController {

	public function getLogin()
	{
		// Localization testing.
		App::setLocale('nl');

		// Return the login view.
		return View::make('user.login');
	}

	public function postLogin() 
	{
		// Set validation rules.
		$rules = array(
			// Make sure the email is an actual email.
			'email' => 'required|email', 

			// Password can only be an alphanumeric and has to be greater than 3 chars.
			'password' => 'required|alphaNum|min:3' 
		);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make(Input::all(), $rules);

		// If the validator failes, redirect back to the form.
		if ($validator->fails()) {
			// Send back all errors to the login form, send back the input (without the password) for repopulating the form.
			return Redirect::to('user/login')->withErrors($validator)->withInput(Input::except('password'));
		}

		else {
			// Create our user data for the authentication.
			$userdata = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			);

			// Attempt to login user.
			if (Auth::attempt($userdata)) {
				// The validation is successful.
				// TODO: Redirect to admin page or whatever, for now we return success.
				echo 'succes!';
			}

			else {
				// The validation failed, send back to form.
				return Redirect::to('user/login');
			}

		}
	}
}