<?php

class AdminController extends BaseController {

	public function __construct() 
	{
		$this->beforeFilter('auth', array(
			'except' => 'getIndex'
		));
	}

	public function getIndex() 
	{
		$vehicles = Vehicle::orderBy('id', 'DESC')->get()->take(5);

		return View::make('admin.index', array('vehicles' => $vehicles));
	}

}