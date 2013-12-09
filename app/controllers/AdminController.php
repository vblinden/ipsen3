<?php

class AdminController extends BaseController {

	public function __construct() 
	{
		$this->beforeFilter('auth.admin');
	}

	public function getIndex() 
	{
		$vehicles = Vehicle::orderBy('id', 'DESC')->get();
		$users = User::orderBy('id', 'DESC')->get();
		$general = General::find(1);

		return View::make('admin.index', array('vehicles' => $vehicles, 'users' => $users, 'general' => $general));
	}

	public function getVehicle() 
	{
		return View::make('admin.vehicle');
	}

	public function postVat() 
	{
		$general = General::find(1);
		$general->vat = Input::all()['vat'];
		$general->save();

		return Redirect::to('/admin#general')->with('success', 'Uw Belasting Toegevoegde Waarde (BTW) is aangepast.');
	}
}