<?php

class HomeController extends BaseController {

	public function __construct() 
	{
		// TEST: Protect this controller from not logged in users, this needs to be placed in
		// controllers which needs to protected from guest access. If some methods are public
		// you can use the except function (check the docs).
		$this->beforeFilter('auth', array('except' => 'getIndex'));
	}

	public function getIndex()
	{
		return View::make('index');
	}

	public function getSecret() 
	{
		return 'This is a very secret page, yo!';
	}

	public function postSecret() 
	{
		$data = Input::all();
	}

}