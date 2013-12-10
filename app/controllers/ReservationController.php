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
		return $id;
		
	}

}