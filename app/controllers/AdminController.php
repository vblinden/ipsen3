<?php

class AdminController extends BaseController {

	public function __construct() 
	{
		$this->beforeFilter('auth.admin');
	}

	public function getIndex() 
	{
		$vehicles = Vehicle::orderBy('id', 'DESC')->get();
		$vehicleoptions = VehicleOption::orderby('id','DESC')->get();
		$users = User::orderBy('id', 'DESC')->get();
		$reservations = Reservation::orderby('id', 'DESC')->get();
		$general = General::find(1);

		return View::make('admin.index', array('vehicles' => $vehicles, 'users' => $users, 'general' => $general, 'vehicleoptions' => $vehicleoptions, 'reservations' => $reservations));
	}

	public function getVehicles() 
	{
		return View::make('admin.vehicles', array('vehicles' => Vehicle::all()));
	}

	public function getVehicleoptions()
	{
		return View::make('admin.vehicleoptions', array('vehicleoptions' => VehicleOption::all()));
	}

	public function getUsers()
	{
		return View::make('admin.users', array('users' => User::all()));
	}

	public function postVat() 
	{
		$general = General::find(1);
		$general->vat = Input::all()['vat'];
		$general->save();

		return Redirect::to('/admin#general')->with('success', 'Uw Belasting Toegevoegde Waarde (BTW) is aangepast.');
	}
}