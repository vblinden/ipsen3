<?php

class VehicleController extends BaseController {

	public function __construct() 
	{
		$this->beforeFilter('auth.admin', array(
			'except' => 'getIndex'
		));
	}

	public function getIndex() 
	{
		return View::make('vehicle.index');
	}

	public function getAdd() 
	{
		return View::make('vehicle.add');
	}

	public function postAdd() 
	{
		$data = Input::all();

		$vehicle = new Vehicle();
		$vehicle->brand = $data['brand'];
		$vehicle->model = $data['model'];
		$vehicle->milage = $data['milage'];
		$vehicle->licenseplate = $data['license'];
		$vehicle->comment = $data['comment'];
		$vehicle->color = $data['color'];
		$vehicle->hourlyrate = $data['hourlyrate'];

		$file = Input::file('image');

		if ($file->getClientOriginalExtension() == 'jpg' || 
			$file->getClientOriginalExtension() == 'png' ||
			$file->getClientOriginalExtension() == 'gif' ||
			$file->getClientOriginalExtension() == 'bmp') 
		{

			$fileName = Str::random(20) .'.'. $file->getClientOriginalExtension();
			$fileDestination = '/users/vblinden/documents/work/school/ipsen3/public/uploaded/vehicles/';
			$file->move($fileDestination, $fileName);

			$vehicle->image = $fileDestination . $fileName;

			$vehicle->save();
		} else {
			return 'Not an image.';
		}

		return Redirect::to('admin/');
	}

	public function getEdit($id) 
	{
		$vehicle = Vehicle::find($id);

		return View::make('vehicle.edit', array('vehicle' => $vehicle));
	}

}