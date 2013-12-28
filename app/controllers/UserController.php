<?php

class UserController extends BaseController {

	public function __construct() 
	{
		$this->beforeFilter('auth.admin', array(
			'except' => array(
				'getLogin', 
				'postLogin', 
				'getRegister', 
				'postRegister', 
				'getSuccess', 
				'getLogout',  
				'postCompany')
		));
	}

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
				return Redirect::intended('/');
			}

			else {
				// The validation failed, send back to form.
				return Redirect::to('user/login')->withErrors($validator)->with('failed', 'Uw e-mail en wachtwoord combinatie klopt niet. Probeer het opnieuw.')->withInput(Input::except('password'));
			}

		}
	}

	public function getRegister($id) 
	{
		// Check if user wants to register a personal or business account.
		if ($id == 'personal') {
			return View::make('user.register');
		}

		else {
			return View::make('user.company');
		}
		
	}

	public function postCompany() 
	{
		// Save all the input data.
		$data = Input::all();

		// Set validation rules.
		$rules = array(
			'email' => 'required|unique:users,email|email',
			'password' => array('required', 'min:3', 'regex:/^(?=.*[A-Z])(?=.*\d).*$/'),
			'passwordconfirm' => 'same:password',
			'firstname' => 'required',
			'lastname' => 'required',
			'zipcode' => 'required',
			'companyname' => 'required',
			'addresslineone' => 'required',
			'city' => 'required',
			'country' => 'required',
			'phonenumber' => 'required',
			'licensenumber' => 'required',
			'passportnumber' => 'required',
			'kvknumber' => 'required',
			'vatnumber' => 'required',
			'recaptcha_response_field' => 'required|recaptcha'
		);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make($data, $rules);

		// If validator fails, show error message.
		if ($validator->fails()) {
			if ($validator->messages()->has('email')) {
				return Redirect::to('/user/register/company')->with('failed', 'Het e-mail adres wat u probeert te gebruiken is al in gebruik of is geen geldig e-mail adres. Probeer het opnieuw.')->withInput(Input::except('password'));
			}

			else if ($validator->messages()->has('password')) {
				return Redirect::to('/user/register/company')->with('failed', 'Uw wachtwoorden moet langer zijn als 3 tekens, een hoofdletter hebben en een cijfer bevatten. Ook moeten de wachtwoorden overeenkomen. Probeer het opnieuw.')->withInput(Input::except('password'));
			}

			else if ($validator->messages()->has('passwordconfirm')) {
				return Redirect::to('/user/register/company')->with('failed', 'Uw wachtwoorden komen niet overeen. Probeer het opnieuw.')->withInput(Input::except('password'));
			}

			else if ($validator->messages()->has('recaptcha_response_field')) {
				return Redirect::to('/user/register/company')->with('failed', 'Uw CAPTCHA invoer is incorrect. Probeer het opnieuw.')->withInput(Input::except('password'));
			}

			else {
				return Redirect::to('/user/register/company')->with('failed', 'U moet alle velden invullen die rood gemarkeerd zijn. Probeer het opnieuw.')->withInput(Input::except('password'));
			}
		}

		else {
			// Create a new user.
			$user = new User;
			$user->email = $data['email'];
			$user->password = Hash::make($data['password']);
			$user->firstname = $data['firstname'];
			$user->lastname = $data['lastname'];
			$user->zipcode = $data['zipcode'];
			$user->addresslineone = $data['addresslineone'];
			$user->addresslinetwo = $data['addresslinetwo'];
			$user->city = $data['city'];
			$user->country = $data['country'];
			$user->phonenumber = $data['phonenumber'];
			$user->licensenumber = $data['licensenumber'];
			$user->passportnumber = $data['passportnumber'];
			$user->kvknumber = $data['kvknumber'];
			$user->vatnumber = $data['vatnumber'];
			$user->business = 1;

			$user->save();

			// Create a new business
			$company = new Company;
			$company->name = $data['companyname'];
			$company->admin_user_id = $user->id;

			$company->save();
			
			$company->users()->save($user);

			$user->company_id = $company->id;
			$user->save();

			// Send mail to the queue, where it will be executed later.
			Queue::push('EmailService@register', array('user' => $user));

			Auth::login($user);

			return Redirect::to('/');
		}
	}

	public function postRegister() 
	{
		// Save all the input data.
		$data = Input::all();

		// Set validation rules.
		$rules = array(
			'email' => 'required|unique:users,email|email',
			'password' => array('required', 'min:3', 'regex:/^(?=.*[A-Z])(?=.*\d).*$/'),
			'passwordconfirm' => 'same:password',
			'firstname' => 'required',
			'lastname' => 'required',
			'zipcode' => 'required',
			'addresslineone' => 'required',
			'city' => 'required',
			'country' => 'required',
			'phonenumber' => 'required',
			'licensenumber' => 'required',
			'passportnumber' => 'required',
			'recaptcha_response_field' => 'required|recaptcha'
		);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make($data, $rules);

		// If validator fails, show error message.
		if ($validator->fails()) {
			if ($validator->messages()->has('email')) {
				return Redirect::to('/user/register')->with('failed', 'Het e-mail adres wat u probeert te gebruiken is al in gebruik of is geen geldig e-mail adres. Probeer het opnieuw.')->withInput(Input::except('password'));
			}

			else if ($validator->messages()->has('password')) {
				return Redirect::to('/user/register')->with('failed', 'Uw wachtwoorden moet langer zijn als 3 tekens, een hoofdletter hebben en een cijfer bevatten. Ook moeten de wachtwoorden overeenkomen. Probeer het opnieuw.')->withInput(Input::except('password'));
			}

			else if ($validator->messages()->has('passwordconfirm')) {
				return Redirect::to('/user/register')->with('failed', 'Uw wachtwoorden komen niet overeen. Probeer het opnieuw.')->withInput(Input::except('password'));
			}

			else if ($validator->messages()->has('recaptcha_response_field')) {
				return Redirect::to('/user/register')->with('failed', 'Uw CAPTCHA invoer is incorrect. Probeer het opnieuw.')->withInput(Input::except('password'));
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
			$user->addresslinetwo = $data['addresslinetwo'];
			$user->city = $data['city'];
			$user->country = $data['country'];
			$user->phonenumber = $data['phonenumber'];
			$user->licensenumber = $data['licensenumber'];
			$user->passportnumber = $data['passportnumber'];
			$user->business = 0;

			$user->save();

			// Send mail to the queue, where it will be executed later.
			Queue::push('EmailService@register', array('user' => $user));

			Auth::login($user);

			return Redirect::to('/');
		}
	}

	public function getEdit($id) 
	{
		return View::make('user.edit', array('user'=>User::find($id)));
	}

	public function postEdit() 
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
			'passportnumber' => 'required',
			'vatnumber' => 'required_with:kvknumber',
			'kvknumber' => 'required_with:vatnumber'
		);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make($data, $rules);

		// If validator fails, show error message.
		if ($validator->fails()) {
			if ($validator->messages()->has('vatnumber')) {
				return Redirect::to('/user/edit')->with('failed', 'U moet als bedrijf zijnde ook een BTW nummer invullen. Probeer het opnieuw.')->withInput();
			} else if ($validator->messages()->has('kvknumber')) {
				return Redirect::to('/user/edit')->with('failed', 'U moet als bedrijf zijnde ook een KVK nummer invullen. Probeer het opnieuw.')->withInput();
			}

			else {
				return Redirect::to('/user/edit')->with('failed', 'U moet alle velden invullen die rood gemarkeerd zijn.');
			}
		}

		// Else show succes message and save the password.
		else {
			$user = Auth::user();
			$user->email = $data['email'];
			$user->firstname = $data['firstname'];
			$user->lastname = $data['lastname'];
			$user->zipcode = $data['zipcode'];
			$user->addresslineone = $data['addresslineone'];
			$user->addresslinetwo = $data['addresslinetwo'];
			$user->city = $data['city'];
			$user->country = $data['country'];
			$user->phonenumber = $data['phonenumber'];
			$user->licensenumber = $data['licensenumber'];
			$user->passportnumber = $data['passportnumber'];
			$user->kvknumber = $data['kvknumber'];
			$user->vatnumber = $data['vatnumber'];
			$user->business = 1;
			
			if (!isset($data['vatnumber']) || trim($data['vatnumber']) ==='') {
				$user->business = 0;
			}

			$user->save();

			return Redirect::to('/user/edit')->with('success', 'Uw gegevens zijn succesvol bijgewerkt.');
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