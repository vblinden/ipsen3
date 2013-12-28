<?php

class CompanyController extends BaseController {

	public function __construct() 
	{
		$this->beforeFilter('auth', array(
			'except' => array('getView', 'getUserdelete', 'getUnsubscribe', 'postUseradd')
		));

		$this->beforeFilter('auth.admin', array(
			'except' => array('getView')
		));
	}

	public function getView($id)
	{
		return View::make('company.view', array('company' => Company::find($id)));
	}

	public function getUserdelete($company_id, $user_id) 
	{
		$company = Company::find($company_id);
		$company->users()->detach($user_id);

		$user = User::find($user_id);
		$user->company_id = 0;
		$user->business = 0;
		$user->save();

		return Redirect::to('/')->with('success', 'U bent met succes afgemeld bij het bedrijf.');
	}

	public function getUnsubscribe($id)
	{
		$company = Company::find($id);
		$company->users()->detach(Auth::user()->id);

		$user = User::find(Auth::user()->id);
		$user->company_id = 0;
		$user->business = 0;
		$user->save();
	}

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

				$company = Company::find($data['company_id']);
				$company->users()->save($user);

				return Redirect::to('/company/view/' . $data['company_id'])->with('success', 'De gebruiker is succesvol toegevoegd.');
			}

			else 
			{
				return Redirect::to('/company/view/' . $data['company_id'])->with('failed', 'Gebruiker is al aangemeld bij een bedrijf.');
			}
		}
	}

	public function getAdd()
	{
		return View::make('company.add');
	}

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

		return Redirect::to('/admin#companies')->with('success', 'Het bedrijf is succesvol verwijderd.');
	}

	public function getEdit($id)
	{
		return View::make('company.edit', array('company' => Company::find($id)));
	}

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
				$company = Company::find($data['company_id']);
				$company->name = $data['name'];
				$company->admin_user_id = $user->id;

				$company->save();

				$user->company_id = $company->id;
				$user->business = 1;
				$user->save();

				$company->users()->save($user);

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

				return Redirect::to('/admin#companies')->with('success', 'Het bedrijf is succesvol bijgewerkt.');
			}

			else 
			{
				return Redirect::to('/company/edit')->with('failed', 'Gebruiker is al administrator bij een bedrijf.')->withInput();
			}
		}
	}

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

				$company->save();

				$user->company_id = $company->id;
				$user->business = 1;
				$user->save();

				$company->users()->save($user);

				return Redirect::to('/admin#companies')->with('success', 'Het bedrijf is succesvol toegevoegd.');
			}

			else 
			{
				return Redirect::to('/company/add')->with('failed', 'Gebruiker is al administrator bij een bedrijf.')->withInput();
			}
		}
	}
}