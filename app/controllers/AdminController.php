<?php

/**
 * Handles all the admin get/post calls.
 * @author Vincent van der Linden and Deam Kop
 */
class AdminController extends BaseController {

	public function __construct() 
	{
		// Only allow admins to access this part.
		$this->beforeFilter('auth.admin');
	}

	/**
	 * Returns the administrator index with all the information needed.
	 * @return view
	 */
	public function getIndex() 
	{
		$vehicles = Vehicle::orderBy('id', 'DESC')->get();
		$vehicleoptions = VehicleOption::orderby('id','DESC')->get();
		$users = User::orderBy('id', 'DESC')->get();
		$userroles = Role::orderBy('id', 'DESC')->get();
		$reservations = Reservation::orderby('id', 'DESC')->get();
		$invoices = Invoice::orderby('id', 'DESC')->get();
		$general = General::find(1);
		$reviews = Review::orderBy('id', 'DESC')->get();
		$companies = Company::orderBy('id', 'DESC')->get();

		return View::make('admin.index', array(
			'vehicles' => $vehicles, 
			'users' => $users, 
			'general' => $general, 
			'vehicleoptions' => $vehicleoptions, 
			'reservations' => $reservations,
			'invoices' => $invoices,
			'userroles' => $userroles,
			'reviews' => $reviews,
			'companies' => $companies));
	}

	/**
	 * Returns all vehicle view.
	 * @return view
	 */
	public function getVehicles() 
	{
		return View::make('admin.vehicles', array('vehicles' => Vehicle::all()));
	}

	/**
	 * Return all vehicle options view.
	 * @return view
	 */
	public function getVehicleoptions()
	{
		return View::make('admin.vehicleoptions', array('vehicleoptions' => VehicleOption::all()));
	}

	/**
	 * Returns all companies view.
	 * @return view
	 */
	public function getCompanies()
	{
		return View::make('admin.companies', array('companies' => Company::all()));
	}

	/**
	 * Returns all users view.
	 * @return view
	 */
	public function getUsers()
	{
		return View::make('admin.users', array('users' => User::all()));
	}

	/**
	 * Returns all reservations view.
	 * @return view
	 */
	public function getReservations() 
	{
		return View::make('admin.reservations', array('reservations' => Reservation::all()));
	}

	/**
	 * Return all invoices view.
	 * @return view
	 */
	public function getInvoices()
	{
		return View::make('admin.invoices', array('invoices' => Invoice::all()));
	}

	/**
	 * Returns all user roles view.
	 * @return view
	 */
	public function getUserroles()
	{
		return View::make('admin.userroles', array('userroles' => Role::all()));
	}

	/**
	 * Returns all reviews view.
	 * @return view
	 */
	public function getReviews()
	{
		return View::make('admin.reviews', array('reviews' => Review::all()));
	}

	/**
	 * Let's the user update the VAT value.
	 * @return redirect
	 */
	public function postVat() 
	{
		// Find and update value.
		$general = General::find(1);
		$general->vat = Input::all()['vat'];

		// Save.
		$general->save();

		// Redirect with a value.
		return Redirect::to('/admin#general')->with('success', 'Uw Belasting Toegevoegde Waarde (BTW) is aangepast.');
	}

	/**
	 * Let's the user update the skin value.
	 * @return redirect
	 */
	public function postSkin() 
	{
		// Find and update the value.
		$general = General::find(1);
		$general->skin = Input::all()['skin'];

		// Save.
		$general->save();

		// Redirect with a message.
		return Redirect::to('/admin#general')->with('success', 'De skin van de website is bijgewerkt.');
	}

	/**
	 * Let's the user update the latest news value.
	 * @return redirect
	 */
	public function postLatestNews() 
	{
		// Find the first row of general.
		$general = General::find(1);

		// Update the information.
		$general->latestnews = Input::all()['latestnews'];
		$general->latestnewsenglish = Input::all()['latestnewsenglish'];

		// Save.
		$general->save();

		// Redirect with a message.
		return Redirect::to('/admin#general')->with('success', 'Het laatste nieuws is bijgewerkt.');
	}
}