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
			'password' => 'required|min:3' 
		);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make(Input::all(), $rules);

		// If the validator failes, redirect back to the form.
		if ($validator->fails()) {
			// Send back all errors to the login form, send back the input (without the password) for repopulating the form.
			return Redirect::to('user/login')->withErrors($validator)->with('failed', 'U moet zowel uw e-mail invullen als uw wachtwoord. Probeer het opnieuw.')->withInput(Input::except('password'));
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
				return Redirect::to('/');
			}

			else {
				// The validation failed, send back to form.
				return Redirect::to('user/login')->withErrors($validator)->with('failed', 'Uw e-mail en wachtwoord combinatie klopt niet. Probeer het opnieuw.')->withInput(Input::except('password'));
			}

		}
	}

	public function getRegister() 
	{
		return View::make('user.register');
	}

	public function postRegister() 
	{
		// Save all the input data.
		$data = Input::all();

		// Set validation rules.
		$rules = array(
			'email' => 'required|unique:users,email|email',
			'password' => 'required|min:3',
			'passwordconfirm' => 'same:password',
			'firstname' => 'required',
			'lastname' => 'required',
			'zipcode' => 'required',
			'addresslineone' => 'required',
			'city' => 'required',
			'country' => 'required',
			'phonenumber' => 'required',
			'licensenumber' => 'required',
			'passportnumber' => 'required'
		);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make($data, $rules);

		// If validator fails, show error message.
		if ($validator->fails()) {
			if ($validator->messages()->has('email')) {
				return Redirect::to('/user/register')->with('failed', 'Het e-mail adres wat u probeert te gebruiken is al in gebruik of is geen geldig e-mail adres. Probeer het opnieuw.')->withInput(Input::except('password'));
			}

			else if ($validator->messages()->has('passwordconfirm')) {
				return Redirect::to('/user/register')->with('failed', 'Uw wachtwoorden moet langer zijn als 3 tekens en de wachtwoorden moeten overeenkomen. Probeer het opnieuw.')->withInput(Input::except('password'));
			}

			else {
				return Redirect::to('/user/register')->with('failed', 'U moet alle velden invullen die rood gemarkeerd zijn. Probeer het opnieuw.')->withInput(Input::except('password'));
			}
		}

		// Else show succes message and save the password.
		else {
			$user = new User;
			$user->email = $data['email'];
			$user->password = Hash::make($data['password']);
			$user->firstname = $data['firstname'];
			$user->lastname = $data['lastname'];
			$user->zipcode = $data['zipcode'];
			$user->addresslineone = $data['addresslineone'];
			$user->city = $data['city'];
			$user->country = $data['country'];
			$user->phonenumber = $data['phonenumber'];
			$user->licensenumber = $data['licensenumber'];
			$user->passportnumber = $data['passportnumber'];
			$user->kvknumber = $data['kvknumber'];
			$user->vatnumber = $data['vatnumber'];
			$user->business = 0;

			if (isset($user->kvknumber) || isset($user->vatnumber)) {
				$user->business = 1;
			}

			$user->save();

			Auth::login($user);

			return Redirect::to('/');
		}
	}

	public function getAccount() 
	{
		return View::make('user.account');
	}

	public function postAccount() 
	{
		// Save all the input data.
		$data = Input::all();

		// Set validation rules.
		$rules = array(
			'email' => 'required',
			'firstname' => 'required',
			'lastname' => 'required',
			'zipcode' => 'required',
			'addresslineone' => 'required',
			'city' => 'required',
			'country' => 'required',
			'phonenumber' => 'required',
			'licensenumber' => 'required',
			'passportnumber' => 'required'
		);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make($data, $rules);

		// If validator fails, show error message.
		if ($validator->fails()) {
			return Redirect::to('/user/account')->with('failed', 'U moet alle velden invullen die rood gemarkeerd zijn.');
		}

		// Else show succes message and save the password.
		else {
			$user = Auth::user();
			$user->email = $data['email'];
			$user->firstname = $data['firstname'];
			$user->lastname = $data['lastname'];
			$user->zipcode = $data['zipcode'];
			$user->addresslineone = $data['addresslineone'];
			$user->city = $data['city'];
			$user->country = $data['country'];
			$user->phonenumber = $data['phonenumber'];
			$user->licensenumber = $data['licensenumber'];
			$user->passportnumber = $data['passportnumber'];
			$user->kvknumber = $data['kvknumber'];
			$user->vatnumber = $data['vatnumber'];
			$user->business = 0;

			if (isset($user->kvknumber) || isset($user->vatnumber)) {
				$user->business = 1;
			}

			$user->save();

			return Redirect::to('/user/account')->with('success', 'Uw gegevens zijn succesvol bijgewerkt.');
		}
	}

	public function postChangePassword() 
	{
		// Save all the input data.
		$data = Input::all();

		// Set validation rules.
		$rules = array(
			'password' => 'required|min:3',
			'passwordconfirm' => 'same:password' 
		);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make($data, $rules);

		// If validator fails, show error message.
		if ($validator->fails()) {
			return Redirect::to('/user/account')->with('failed', 'Uw wachtwoord moet groter zijn als 3 tekens en de twee wachtwoorden moeten overeenkomen. Probeer het opnieuw.');
		}

		// Else show succes message and save the password.
		else {
			$user = Auth::user();
			$user->password = Hash::make($data['password']);
			$user->save();

			return Redirect::to('/user/account')->with('success', 'Uw wachtwoord is succesvol gewijzigd.');
		}
	}

	public function getSuccess() 
	{
		return View::make('user.success');
	}

	public function getLogout() 
	{
		Auth::logout();

		return Redirect::to('/');
	}

	public function getDelete($id) 
	{
		$user = User::find($id);
		$user->delete();

		return Redirect::to('/admin#users')->with('success', 'De klant is succesvol verwijderd.');
	}

}