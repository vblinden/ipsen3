<?php

class AdminController extends BaseController {

	public function __construct() 
	{
		$this->beforeFilter('auth.admin');
	}

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

	public function getVehicles() 
	{
		return View::make('admin.vehicles', array('vehicles' => Vehicle::all()));
	}

	public function getVehicleoptions()
	{
		return View::make('admin.vehicleoptions', array('vehicleoptions' => VehicleOption::all()));
	}

	public function getCompanies()
	{
		return View::make('admin.companies', array('companies' => Company::all()));
	}

	public function getUsers()
	{
		return View::make('admin.users', array('users' => User::all()));
	}

	public function getReservations() 
	{
		return View::make('admin.reservations', array('reservations' => Reservation::all()));
	}

	public function getInvoices()
	{
		return View::make('admin.invoices', array('invoices' => Invoice::all()));
	}

	public function getUserroles()
	{
		return View::make('admin.userroles', array('userroles' => Role::all()));
	}

	public function getReviews()
	{
		return View::make('admin.reviews', array('reviews' => Review::all()));
	}

	public function postVat() 
	{
		$general = General::find(1);
		$general->vat = Input::all()['vat'];
		$general->save();

		return Redirect::to('/admin#general')->with('success', 'Uw Belasting Toegevoegde Waarde (BTW) is aangepast.');
	}
}