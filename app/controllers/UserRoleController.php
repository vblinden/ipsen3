<?php

/**
 * @author Deam Kop and Vincent van der Linden
 */
class UserRoleController extends BaseController {

	public function __construct() 
	{
		// Check if user is admin.
		$this->beforeFilter('auth.admin');
	}

	/**
	 * Returns the add user role view.
	 * @return view 
	 */
	public function getAdd() 
	{
		return View::make('userrole.add');
	}

	/**
	 * Adds a user role.
	 * @return redirect
	 */
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

	/**
	 * Returns the edit user role view.
	 * @param  var $id The id of the user role.
	 * @return view
	 */
	public function getEdit($id) 
	{
		return View::make('userrole.edit', array('userrole' => Role::find($id)));
	}

	/**
	 * Changes the user role.
	 * @return redirect
	 */
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

			// Redirect the user with a message.
			return Redirect::to('/admin#userroles')->with('success', 'De gebruikers rol is succesvol bijgewerkt.');
		}
	}

	/**
	 * Deletes a user role.
	 * @param  var $id The id of the user role.
	 * @return redirect
	 */
	public function getDelete($id) 
	{
		// Find the role.
		$role = Role::find($id);

		// Check if the role is admin or Administrator. If so, we can't delete it, redirect the user.
		if ($role->name === 'admin' || $role->name === 'Administrator') {
			return Redirect::to('/admin#userroles')->with('failed', 'De gebruikers rol "Admin" of "Administrator" mag niet worden verwijderd.');
		} else {
			// Delete the user role.
			$role->delete();

			// Return the user with a message.
			return Redirect::to('/admin#userroles')->with('success', 'De gebruikers rol is succesvol verwijderd.');
		}
	}

}