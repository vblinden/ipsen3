<?php

class InvoiceController extends BaseController {

	public function __construct() 
	{
		$this->beforeFilter('auth', array(
			'except' => 'getIndex'
		));
	}

	public function getIndex()
	{
		$invoice = Invoice::paginate(15);

		return View::make('invoice.index', array('reviews' => $reviews));
	}
}