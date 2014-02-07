<?php


/**
 * Handles the get and post calls that are linked with vehicle.
 * @author Vincent van der Linden
 */
class VehicleController extends BaseController {

	public function __construct() 
	{
		// Check if user is admin except for the following routes.
		$this->beforeFilter('auth.admin', array(
			'except' => array('getIndex' , 'getPerson', 'getCompany', 'getMotor', 'getScooter', 'getDetail')
		));
	}

	/**
	 * Return the vehicle index view.
	 * @return view
	 */
	public function getIndex() 
	{
		// Get vehicles.
		$vehicles = Vehicle::paginate(1);

		// Return view with information.
		return View::make('vehicle.index', array('vehicles' => $vehicles));
	}

	/**
	 * Return the vehicle index view with personal cars.
	 * @return view
	 */
	public function getPerson() 
	{
		$vehicles = Vehicle::where('vehiclecategoryid', '=', '1')->paginate(9);

		return View::make('vehicle.index', array('vehicles' => $vehicles));
	}

	/**
	 * Return the vehicle index view with company cars.
	 * @return view
	 */
	public function getCompany() 
	{
		$vehicles = Vehicle::where('vehiclecategoryid', '=', '2')->paginate(9);

		return View::make('vehicle.index', array('vehicles' => $vehicles));
	}

	/**
	 * Return the vehicle index view with motors.
	 * @return view
	 */
	public function getMotor() 
	{
		$vehicles = Vehicle::where('vehiclecategoryid', '=', '3')->paginate(9);

		return View::make('vehicle.index', array('vehicles' => $vehicles));
	}

	/**
	 * Return the vehicle index view with scooters.
	 * @return view
	 */
	public function getScooter() 
	{
		$vehicles = Vehicle::where('vehiclecategoryid', '=', '4')->paginate(9);

		return View::make('vehicle.index', array('vehicles' => $vehicles));
	}

	/**
	 * Returns a detail view of the vehicle.
	 * @param  var $id The id of the vehicle.
	 * @return view
	 */
	public function getDetail($id)
	{
		// Find vehicle and the reviews.
		$vehicle = Vehicle::find($id);
		$reviews = Review::where('vehicle_id', '=', $id)->paginate(5);

		// Return the view and the information.
		return View::make('vehicle.detail', array('vehicle' => $vehicle, 'reviews' => $reviews));
	}

	/**
	 * Returns the add vehicle view.
	 * @return view
	 */
	public function getAdd() 
	{
		return View::make('vehicle.add');
	}

	/**
	 * Post of the add vehicle view.
	 * @return redirect
	 */
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
			'vehicleusage' => 'required',
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
			$vehicle->vehicleusage = $data['vehicleusage'];
			$vehicle->hourlyrate = $data['hourlyrate'];
			$vehicle->vehiclecategoryid = $data['vehiclecategoryid'];

			// Save the image.
			$file = Input::file('image');

			// Check if image is null.
			if ($file != null) {
				$fileName = Str::random(20) .'.'. $file->getClientOriginalExtension();
				$fileDestination = base_path().'/public/uploaded/vehicles/';
				$file->move($fileDestination, $fileName);

				$vehicle->image = $fileName;
			}

			// Save the vehicle.
			$vehicle->save();

			// Redirect the user with a message.
			return Redirect::to('/admin#vehicles')->with('success', 'Het voertuig is succesvol toegevoegd.');
		}
	}

	/**
	 * Return the edit vehicle view.
	 * @param  var $id The vehicle id.
	 * @return view
	 */
	public function getEdit($id) 
	{
		$vehicle = Vehicle::find($id);

		return View::make('vehicle.edit', array('vehicle' => $vehicle));
	}

	/**
	 * Post of the edit vehicle view.
	 * @return redirect
	 */
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
			'vehicleusage' => 'required',
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
			$vehicle->vehicleusage = $data['vehicleusage'];
			$vehicle->hourlyrate = $data['hourlyrate'];
			$vehicle->vehiclecategoryid = $data['vehiclecategoryid'];

			// Save file in var.
			$file = Input::file('image');

			// Check if the file is not null.
			if ($file != null) {
				$fileName = Str::random(20) .'.'. $file->getClientOriginalExtension();
				$fileDestination = base_path().'/public/uploaded/vehicles/';
				$file->move($fileDestination, $fileName);

				$vehicle->image = $fileName;
			}

			// Save the vehicle.
			$vehicle->save();

			// Redirect the user with a message.
			return Redirect::to('/vehicle/detail/'.$data['id'])->with('success', 'Het voertuig is succesvol bijgewerkt.');
		}
	}

	/**
	 * Delete a vehicle.
	 * @param  var $id The vehicle id.
	 * @return redirect
	 */
	public function getDelete($id) 
	{
		// Find and delete the vehicle.
		$vehicle = Vehicle::find($id);
		$vehicle->delete();

		return Redirect::to('/admin#vehicles')->with('success', 'Het voertuig is succesvol verwijderd.');
	}
}