<?php

class VehicleOptionController extends BaseController
{
	public function __construct() 
	{
		$this->beforeFilter('auth.admin', array(
			'except' => array('getIndex')
		));
	}

	public function getIndex()
	{
		$vehicleoptions = VehicleOption::paginate(15);

		return View::make('vehicleoption.index', array('vehicleoptions' => $vehicleoptions));
	}

	public function getAdd()
	{
		return View::make('vehicleoption.add');
	}

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

			return Redirect::to('/admin#vehiclesoptions')->with('success', 'De optie is succesvol toegevoegd.');
		}
	}

	public function getEdit($id)
	{
		$vehicleoption = VehicleOption::find($id);

		return View::make('vehicleoption.edit', array('vehicleoption' => $vehicleoption));
	}

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

			return Redirect::to('/admin#vehiclesoptions')->with('success', 'De optie is succesvol bijgewerkt.');
		}
	}

	public function getDelete($id)
	{
		$vehicle = VehicleOption::find($id);
		$vehicle->delete();

		return Redirect::to('/admin#vehiclesoptions')->with('success', 'De optie is succesvol verwijderd.');
	}
}