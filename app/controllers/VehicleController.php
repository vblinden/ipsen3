<?php

class VehicleController extends BaseController {

	public function __construct() 
	{
		// TEST: Protect this controller from not logged in users, this needs to be placed in
		// controllers which needs to protected from guest access. If some methods are public
		// you can use the except function (check the docs).
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

}