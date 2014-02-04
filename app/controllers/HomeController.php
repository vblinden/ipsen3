<?php

/**
 * Handles all the home get/post calls.
 * @author Vincent van der Linden
 */
class HomeController extends BaseController {

	/**
	 * Returns the index view.
	 * @return view
	 */
	public function getIndex()
	{
		return View::make('index');
	}

	/**
	 * Return the F.A.Q. view.
	 * @return view
	 */
	public function getFaq() 
	{
		return View::make('faq');
	}

	/**
	 * Returns the contact view.
	 * @return view
	 */
	public function getContact() 
	{
		return View::make('contact');
	}
}