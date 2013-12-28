<?php

class UserRoleController extends BaseController {

	public function __construct() 
	{
		$this->beforeFilter('auth.admin');
	}

	public function getAdd() 
	{
		return View::make('userrole.add');
	}

	public function postAdd()
	{
		// Save all the input data.
		$data = Input::all();

		// Set validation rules.
		$rules = array(
			'name' => 'required'
			);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make($data, $rules);

		// If validator fails, show error message.
		if ($validator->fails()) {
			return Redirect::to('/userrole/add')->with('failed', 'U moet alle velden invullen. Probeer het opnieuw.')->withInput();
		}

		// Else show succes message.
		else {
			$userrole = new Role();
			$userrole->name = $data['name'];

			$userrole->save();

			return Redirect::to('/admin#userroles')->with('success', 'De gebruikers rol is succesvol toegevoegd.');
		}
	}

	public function getEdit($id) 
	{
		return View::make('userrole.edit', array('userrole' => Role::find($id)));
	}

	public function postEdit()
	{
		// Save all the input data.
		$data = Input::all();

		// Set validation rules.
		$rules = array(
			'name' => 'required'
			);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make($data, $rules);

		// If validator fails, show error message.
		if ($validator->fails()) {
			return Redirect::to('/userrole/edit/' . $data['id'])->with('failed', 'U moet alle velden invullen. Probeer het opnieuw.')->withInput();
		}

		// Else show succes message.
		else {
			$userrole = Role::find($data['id']);
			$userrole->name = $data['name'];

			$userrole->save();

			return Redirect::to('/admin#userroles')->with('success', 'De gebruikers rol is succesvol bijgewerkt.');
		}
	}

	public function getDelete($id) 
	{
		$role = Role::find($id);

		if ($role->name === 'admin' || $role->name === 'Administrator') {
			return Redirect::to('/admin#userroles')->with('failed', 'De gebruikers rol "Admin" of "Administrator" mag niet worden verwijderd.');
		} else {
			$role->delete();

			return Redirect::to('/admin#userroles')->with('success', 'De gebruikers rol is succesvol verwijderd.');
		}
	}

}