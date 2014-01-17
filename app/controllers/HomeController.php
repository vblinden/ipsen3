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

	public function getDutch()
	{
		App::setLocale('nl');

		return Redirect::to('/');
	}

	public function getEnglish()
	{
		App::setLocale('en');

		return Redirect::to('/');
	}

}