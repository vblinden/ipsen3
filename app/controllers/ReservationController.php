<?php

class ReservationController extends BaseController {

	public function __construct() 
	{
		$this->beforeFilter('auth', array(
			'except' => 'getIndex'
		));
	}

	public function getMake($id)
	{
		$vehicle = Vehicle::find($id);
		$vehicleoptions = VehicleOption::all();

		return View::make('reservation.make', array('vehicle' => $vehicle, 'vehicleoptions' => $vehicleoptions));	
	}

}