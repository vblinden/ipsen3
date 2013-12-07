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

		return View::make('admin.index', array('vehicles' => $vehicles, 'users' => $users));
	}

	public function getVehicle() 
	{
		return View::make('admin.vehicle');
	}

}