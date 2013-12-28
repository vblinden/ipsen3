<?php

class CompanyController extends BaseController {

	public function __construct() 
	{
		$this->beforeFilter('auth', array(
			'except' => 'getView'
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
		$user->save();

		return Redirect::to('/company/view/' . $company_id)->with('failed', 'Gebruiker is al aangemeld bij een bedrijf.');
	}

	public function postAdd()
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

				return Redirect::to('/company/view/' . $data['company_id'])->with('success', 'De optie is succesvol toegevoegd.');
			}

			else 
			{
				return Redirect::to('/company/view/' . $data['company_id'])->with('failed', 'Gebruiker is al aangemeld bij een bedrijf.');
			}
		}
	}
}