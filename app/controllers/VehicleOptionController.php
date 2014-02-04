<?php

/**
 * Handles all the get and post calls that are linked with vehicle option.
 * @author Vincent van der Linden and Deam Kop
 */
class VehicleOptionController extends BaseController
{
	public function __construct() 
	{
		// Check if user is an admin, except for the index page.
		$this->beforeFilter('auth.admin', array(
			'except' => array('getIndex')
		));
	}

	/**
	 * Return the index page.
	 * @return view
	 */
	public function getIndex()
	{
		// Get 15 vehicle options.
		$vehicleoptions = VehicleOption::paginate(15);

		// Return view with the options.
		return View::make('vehicleoption.index', array('vehicleoptions' => $vehicleoptions));
	}

	/**
	 * Returns the add vehicle option view.
	 * @return view
	 */
	public function getAdd()
	{
		return View::make('vehicleoption.add');
	}

	/**
	 * Post of the add vehicle option view.
	 * @return redirect
	 */
	public function postAdd() 
	{
		// Save all the input data.
		$data = Input::all();

		// Set validation rules.
		$rules = array(
			'name' => 'required',
			'price' => 'required',
			);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make($data, $rules);

		// If validator fails, show error message.
		if ($validator->fails()) {

			return Redirect::to('/vehicleoption/add')->with('failed', 'U moet alle velden invullen. Probeer het opnieuw.')->withInput();
		}

		// Else show succes message.
		else {
			$vehicleoption = new VehicleOption();
			$vehicleoption->name = $data['name'];
			$vehicleoption->price = $data['price'];

			$vehicleoption->save();

			// Redirect the user with a message.
			return Redirect::to('/admin#vehiclesoptions')->with('success', 'De optie is succesvol toegevoegd.');
		}
	}

	/**
	 * Returns the edit vehicle option view.
	 * @param var $id The id of the vehicle option.
	 * @return view
	 */
	public function getEdit($id)
	{
		// Get the vehicle option and pass it to the view.
		$vehicleoption = VehicleOption::find($id);

		return View::make('vehicleoption.edit', array('vehicleoption' => $vehicleoption));
	}

	/**
	 * The post of the edit vehicle option view.
	 * @return redirect
	 */
	public function postEdit()
	{
		// Save all the input data.
		$data = Input::all();

		// Set validation rules.
		$rules = array(
			'name' => 'required',
			'price' => 'required',
		);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make($data, $rules);

		// If validator fails, show error message.
		if ($validator->fails()) {
			return Redirect::to('/vehicleoption/edit/' . $data['id'])->with('failed', 'U moet alle velden invullen. Probeer het opnieuw.')->withInput();
		}

		// Else show succes message.
		else {
			$vehicle = VehicleOption::find($data['id']);
			$vehicle->name = $data['name'];
			$vehicle->price = $data['price'];

			$vehicle->save();

			// Redirect the user with a message.
			return Redirect::to('/admin#vehiclesoptions')->with('success', 'De optie is succesvol bijgewerkt.');
		}
	}

	/**
	 * Delete a vehicle option.
	 * @param  var $id The vehicle option id.
	 * @return redirect
	 */
	public function getDelete($id)
	{
		// Get the vehicle option by id and delete it.
		$vehicle = VehicleOption::find($id);
		$vehicle->delete();

		// Redirect the user with a message.
		return Redirect::to('/admin#vehiclesoptions')->with('success', 'De optie is succesvol verwijderd.');
	}
}