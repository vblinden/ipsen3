<?php

class VehicleController extends BaseController {

	public function __construct() 
	{
		$this->beforeFilter('auth.admin', array(
			'except' => array('getIndex' , 'getPerson', 'getCompany', 'getMotor', 'getScooter', 'getDetail')
		));
	}

	public function getIndex() 
	{
		$vehicles = Vehicle::paginate(1);

		return View::make('vehicle.index', array('vehicles' => $vehicles));
	}

	public function getPerson() 
	{
		$vehicles = Vehicle::where('vehiclecategoryid', '=', '1')->paginate(9);

		return View::make('vehicle.index', array('vehicles' => $vehicles));
	}

	public function getCompany() 
	{
		$vehicles = Vehicle::where('vehiclecategoryid', '=', '2')->paginate(9);

		return View::make('vehicle.index', array('vehicles' => $vehicles));
	}

	public function getMotor() 
	{
		$vehicles = Vehicle::where('vehiclecategoryid', '=', '3')->paginate(9);

		return View::make('vehicle.index', array('vehicles' => $vehicles));
	}

	public function getScooter() 
	{
		$vehicles = Vehicle::where('vehiclecategoryid', '=', '4')->paginate(9);

		return View::make('vehicle.index', array('vehicles' => $vehicles));
	}

	public function getDetail($id)
	{
		$vehicle = Vehicle::find($id);
		$reviews = Review::where('vehicleid', '=', $id)->paginate(5);

		return View::make('vehicle.detail', array('vehicle' => $vehicle, 'reviews' => $reviews));
	}

	public function getAdd() 
	{
		return View::make('vehicle.add');
	}

	public function postAdd() 
	{
		// Save all the input data.
		$data = Input::all();

		// Set validation rules.
		$rules = array(
			'brand' => 'required',
			'model' => 'required',
			'licenseplate' => 'required',
			'milage' => 'required',
			'usage' => 'required',
			'color' => 'required',
			'hourlyrate' => 'required',
			'image' => 'mimes:jpeg,jpg,gif,bmp,png'
			);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make($data, $rules);

		// If validator fails, show error message.
		if ($validator->fails()) {
			if ($validator->messages()->has('image')) {
				return Redirect::to('/vehicle/add')->with('failed', 'De afbeelding moet van het type "png", "jpg", "bmp" of "gif" zijn. Probeer het opniew.')->withInput();
			}

			else {
				return Redirect::to('/vehicle/add')->with('failed', 'U moet alle velden invullen, behalve opmerkingen. Probeer het opnieuw.')->withInput();
			}
		}

		// Else show succes message.
		else {
			$vehicle = new Vehicle();
			$vehicle->brand = $data['brand'];
			$vehicle->model = $data['model'];
			$vehicle->milage = $data['milage'];
			$vehicle->licenseplate = $data['licenseplate'];
			$vehicle->comment = $data['comment'];
			$vehicle->color = $data['color'];
			$vehicle->usage = $data['usage'];
			$vehicle->hourlyrate = $data['hourlyrate'];
			$vehicle->vehiclecategoryid = $data['vehiclecategoryid'];

			$file = Input::file('image');

			if ($file != null) {
				$fileName = Str::random(20) .'.'. $file->getClientOriginalExtension();
				$fileDestination = base_path().'/public/uploaded/vehicles/';
				$file->move($fileDestination, $fileName);

				$vehicle->image = $fileName;
			}

			$vehicle->save();

			return Redirect::to('/admin#vehicles')->with('success', 'Het voertuig is succesvol toegevoegd.');
		}
	}

	public function getEdit($id) 
	{
		$vehicle = Vehicle::find($id);

		return View::make('vehicle.edit', array('vehicle' => $vehicle));
	}

	public function postEdit() 
	{
		// Save all the input data.
		$data = Input::all();

		// Set validation rules.
		$rules = array(
			'brand' => 'required',
			'model' => 'required',
			'licenseplate' => 'required',
			'milage' => 'required',
			'usage' => 'required',
			'color' => 'required',
			'hourlyrate' => 'required',
			'image' => 'mimes:jpeg,jpg,gif,bmp,png'
		);

		// Run the validator rules on the inputs from the form.
		$validator = Validator::make($data, $rules);

		// If validator fails, show error message.
		if ($validator->fails()) {
			if ($validator->messages()->has('image')) {
				return Redirect::to('/vehicle/edit/' . $data['id'])->with('failed', 'De afbeelding moet van het type "png", "jpg", "bmp" of "gif" zijn. Probeer het opniew.')->withInput();
			}

			else {
				return Redirect::to('/vehicle/edit/' . $data['id'])->with('failed', 'U moet alle velden invullen, behalve opmerkingen. Probeer het opnieuw.')->withInput();
			}
		}

		// Else show succes message.
		else {
			$vehicle = Vehicle::find($data['id']);
			$vehicle->brand = $data['brand'];
			$vehicle->model = $data['model'];
			$vehicle->milage = $data['milage'];
			$vehicle->licenseplate = $data['licenseplate'];
			$vehicle->comment = $data['comment'];
			$vehicle->color = $data['color'];
			$vehicle->usage = $data['usage'];
			$vehicle->hourlyrate = $data['hourlyrate'];
			$vehicle->vehiclecategoryid = $data['vehiclecategoryid'];

			$file = Input::file('image');

			if ($file != null) {
				$fileName = Str::random(20) .'.'. $file->getClientOriginalExtension();
				$fileDestination = base_path().'/public/uploaded/vehicles/';
				$file->move($fileDestination, $fileName);

				$vehicle->image = $fileName;
			}

			$vehicle->save();

			return Redirect::to('/vehicle/detail/'.$data['id'])->with('success', 'Het voertuig is succesvol bijgewerkt.');
		}
	}

	public function getDelete($id) 
	{
		$vehicle = Vehicle::find($id);
		$vehicle->delete();

		return Redirect::to('/admin#vehicles')->with('success', 'Het voertuig is succesvol verwijderd.');
	}
}