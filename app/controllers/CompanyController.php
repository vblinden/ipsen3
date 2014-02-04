<?php

/**
 * Handles all the get and posts calls from company.
 * @author Vincent van der Linden
 */
class CompanyController extends BaseController {

	public function __construct() 
	{
		// Check if the user is logged in.
		$this->beforeFilter('auth', array(
			'except' => array('getView', 'getUserdelete', 'getUnsubscribe', 'postUseradd')
		));

		// Check if the user is admin, except the following routes.
		$this->beforeFilter('auth.admin', array(
			'except' => array('getView')
		));
	}

	/**
	 * Return the company view.
	 * @param  var $id The id of the company.
	 * @return view
	 */
	public function getView($id)
	{
		return View::make('company.view', array('company' => Company::find($id)));
	}

	/**
	 * Remove a user from the company.
	 * @param  var $company_id The company id.
	 * @param  var $user_id    The user id.
	 * @return redirect 
	 */
	public function getUserdelete($company_id, $user_id) 
	{
		// Find the company and remove the user.
		$company = Company::find($company_id);
		$company->users()->detach($user_id);

		// Find the user and set the company id zero.
		$user = User::find($user_id);
		$user->company_id = 0;
		$user->business = 0;

		// Save the user.
		$user->save();

		// Redirect the user with a message.
		return Redirect::to('/')->with('success', 'U bent met succes afgemeld bij het bedrijf.');
	}

	/**
	 * Let's the user unsubcribe from the company.
	 * @param  var $id The company id.
	 * @return [type]     [description]
	 */
	public function getUnsubscribe($id)
	{
		// Remove user from company.
		$company = Company::find($id);
		$company->users()->detach(Auth::user()->id);

		// Find the user and reset company.
		$user = User::find(Auth::user()->id);
		$user->company_id = 0;
		$user->business = 0;

		// Save the user.
		$user->save();
	}

	/**
	 * Add a user to the company.
	 * @return redirect
	 */
	public function postUseradd()
	{
		// Save all the input data.
		$data = Input::all();

		// Set validation rules.
		$rules = array(
			'user_id' => 'required'
		);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make($data, $rules);

		// If validator fails, show error message.
		if ($validator->fails()) {
			return Redirect::to('/company/view/' . $data['company_id'])->with('failed', 'U moet alle velden invullen. Probeer het opnieuw.')->withInput();
		}

		// Else show succes message.
		else {
			$user = User::find($data['user_id']);
			if ($user->company_id == 0) {
				$user->company_id = $data['company_id'];
				$user->business = 1;
				$user->save();

				// Find company and add user.
				$company = Company::find($data['company_id']);
				$company->users()->save($user);

				// Redirect user with message.
				return Redirect::to('/company/view/' . $data['company_id'])->with('success', 'De gebruiker is succesvol toegevoegd.');
			}

			else 
			{
				// Redirect user with message.
				return Redirect::to('/company/view/' . $data['company_id'])->with('failed', 'Gebruiker is al aangemeld bij een bedrijf.');
			}
		}
	}

	/**
	 * Return the add view.
	 * @return view
	 */
	public function getAdd()
	{
		return View::make('company.add');
	}

	/**
	 * Delete a company.
	 * @param  var $id The company id.
	 * @return redirect
	 */
	public function getDelete($id)
	{
		// Get the company.
		$company = Company::find($id);

		// Set all users to no business and company.
		foreach ($company->users as $user) {
			$user = User::find($user->id);
			$user->business = 0;
			$user->company_id = 0;
			$user->save();
		}

		// Remove all users.
		$company->users()->detach();
		$company->delete();

		// Redirect the user with a message.
		return Redirect::to('/admin#companies')->with('success', 'Het bedrijf is succesvol verwijderd.');
	}

	/**
	 * Returns the comapny edit view.
	 * @param  var $id The company id.
	 * @return view
	 */
	public function getEdit($id)
	{
		return View::make('company.edit', array('company' => Company::find($id)));
	}

	/**
	 * Post of the company edit view.
	 * @return redirect
	 */
	public function postEdit()
	{
		// Save all the input data.
		$data = Input::all();

		// Set validation rules.
		$rules = array(
			'name' => 'required',
			'admin_user_id' => 'required'
		);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make($data, $rules);

		// If validator fails, show error message.
		if ($validator->fails()) {
			return Redirect::to('/company/add')->with('failed', 'U moet alle velden invullen. Probeer het opnieuw.')->withInput();
		}

		// Else show succes message.
		else {
			$user = User::find($data['admin_user_id']);

			if ($user->company_id == $data['company_id'])
			{
				// Find the company.
				$company = Company::find($data['company_id']);
				$company->name = $data['name'];
				$company->admin_user_id = $user->id;

				// Save the company.
				$company->save();

				$user->company_id = $company->id;
				$user->business = 1;
				$user->save();

				// Save the users with the company.
				$company->users()->save($user);

				// Redirect the user with a message.
				return Redirect::to('/admin#companies')->with('success', 'Het bedrijf is bijgewerkt.');
			}

			else if ($user->company_id == 0) {
				$company = Company::find($data['company_id']);
				$company->name = $data['name'];
				$company->admin_user_id = $user->id;

				$company->save();

				$user->company_id = $company->id;
				$user->business = 1;
				$user->save();

				$company->users()->save($user);

				// Redirect the user with a message.
				return Redirect::to('/admin#companies')->with('success', 'Het bedrijf is succesvol bijgewerkt.');
			}

			else 
			{
				// Redirect the user with a message.
				return Redirect::to('/company/edit')->with('failed', 'Gebruiker is al administrator bij een bedrijf.')->withInput();
			}
		}
	}


	/**
	 * Post of the company add view.
	 * @return [type] [description]
	 */
	public function postAdd() 
	{
		// Save all the input data.
		$data = Input::all();

		// Set validation rules.
		$rules = array(
			'name' => 'required',
			'admin_user_id' => 'required'
		);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make($data, $rules);

		// If validator fails, show error message.
		if ($validator->fails()) {
			return Redirect::to('/company/add')->with('failed', 'U moet alle velden invullen. Probeer het opnieuw.')->withInput();
		}

		// Else show succes message.
		else {
			$user = User::find($data['admin_user_id']);
			if ($user->company_id == 0) {
				$company = new Company;
				$company->name = $data['name'];
				$company->admin_user_id = $user->id;

				// Save the company.
				$company->save();

				// Create link between company and user.
				$user->company_id = $company->id;
				$user->business = 1;

				// Save user.
				$user->save();

				$company->users()->save($user);

				// Redirect the user with a message.
				return Redirect::to('/admin#companies')->with('success', 'Het bedrijf is succesvol toegevoegd.');
			}

			else 
			{
				// Redirect the user with a message.
				return Redirect::to('/company/add')->with('failed', 'Gebruiker is al administrator bij een bedrijf.')->withInput();
			}
		}
	}
}