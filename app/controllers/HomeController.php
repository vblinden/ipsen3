<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		return View::make('index');
	}

	public function getFaq() 
	{
		return View::make('faq');
	}

	public function getContact() 
	{
		return View::make('contact');
	}
}