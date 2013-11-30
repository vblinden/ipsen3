<?php

class HomeController extends BaseController {

	public function __construct() 
	{
		// TEST: Protect this controller from not logged in users.
		$this->beforeFilter('auth');
	}

	public function getIndex()
	{
		return View::make('index');
	}

}