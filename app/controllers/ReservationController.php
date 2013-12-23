<?php

class ReservationController extends BaseController {

	public function __construct() 
	{
		$this->beforeFilter('auth', array(
			'except' => 'getIndex'
		));
	}

	public function getIndex() 
	{
		return View::make('reservation.index', array('input' => 0));
	}

	public function postIndex()
	{
		// Get all the data.
		$data = Input::all();

		// Set validator rules.
		$rules = array(
			'startdate' => 'required',
			'enddate' => 'required'
		);

		// Create a validator with the data and the rules we set above.
		$validator = Validator::make($data, $rules);

		// If the validator fails, return to page with error and with input (if there is any).
		if ($validator->fails()) {
			return Redirect::to('reservation/index')->with('failed', 'U moet een begin en eind datum opgeven. Probeer het opnieuw.')->withInput();
		}
		
		// Only get vehicles from the selected category.
		$vehicles = Vehicle::where('vehiclecategoryid', '=', $data['vehiclecategoryid'])->get();
		$reservations = Reservation::all();

		// Filter the vehicles.
		$vehicles = $vehicles->filter(function ($vehicle) use ($reservations, $data)
		{
			// Check every reservation. (Maybe use has method or something else)
			foreach ($reservations as $reservation) {

				// Check if vehicle has an reservation.
				if ($reservation->vehicle_id == $vehicle->id) {

					// Check if the start date is between the two selected dates.
					if (Carbon::parse($reservation->startdate)->between(Carbon::parse($data['startdate']), Carbon::parse($data['enddate']))) {
						return false;
					}

					// Check if the end date is between the two selected dates.
					else if (Carbon::parse($reservation->enddate)->between(Carbon::parse($data['startdate']), Carbon::parse($data['enddate']))) {
						return false;
					}
				}
			}

			// If vehicle doesn't have an reservation, add it to the vehicles collection.
			return true;
		});

		// Create cookie for dates.
		$cookie = Cookie::forever('dates', array('startdate' => $data['startdate'], 'enddate' => $data['enddate']));
		Cookie::queue($cookie);

		return View::make('reservation.index', array('input' => $data))->nest('child', 'reservation.availablevehicles', array('vehicles' => $vehicles));
	}

	public function getMake($id)
	{
		$vehicle = Vehicle::find($id);
		$vehicleoptions = VehicleOption::all();

		return View::make('reservation.make', array('vehicle' => $vehicle, 'vehicleoptions' => $vehicleoptions));	
	}

	public function postMake()
	{
		// Save all the input data.
		$data = Input::all();
		
		$reservation = new Reservation();
		$reservation->user_id = Auth::user()->id;
		$reservation->vehicle_id = $data['vehicleid'];
		$reservation->startdate = $data['startdate'];
		$reservation->enddate = $data['enddate'];
		$reservation->status = 0;

		$reservation->save();

		// Detach all vehicle options from this reservation.
		$reservation->vehicleoptions()->detach();

		// Add the selected vehicle options to this reservation.
		if (isset($data['vehicleoption'])) {
			foreach($data['vehicleoption'] as $vehicleoption)
			{
				$vo = VehicleOption::find($vehicleoption);

				$reservation->vehicleoptions()->save($vo);
			}
		} 

		return Redirect::to('/reservation/check/' . $reservation->id);
	}

	public function getCheck($id)
	{
		$reservation = Reservation::find($id);
		$totalPrice = $reservation->vehicle->hourlyrate * 24;

		foreach ($reservation->vehicleoptions as $vehicleoption) {
			$totalPrice += $vehicleoption->price * 24;
		}

		$datetime1 = new DateTime($reservation->startdate);
		$datetime2 = new DateTime($reservation->enddate);
		$interval = $datetime1->diff($datetime2);

		$totalPrice = $totalPrice * $interval->format('%a');
		$vat = $totalPrice / 100 * General::find(1)->vat;

		return View::make('reservation.check', array(
			'reservation' => Reservation::find($id),
			'totalPrice' => $totalPrice,
			'vat' => $vat
		));
	}

	public function getEdit($id) 
	{
		return View::make('reservation.edit', array('reservation' => Reservation::find($id)));
	}

	public function postEdit() 
	{
		// Save all the input data.
		$data = Input::all();

		$reservation = Reservation::find($data['id']);
		$reservation->startdate = $data['startdate'];
		$reservation->enddate = $data['enddate'];
		$reservation->status = 1;

		$reservation->save();

		// Detach all vehicle options from this reservation.
		$reservation->vehicleoptions()->detach();

		// Add the selected vehicle options to this reservation.
		if (isset($data['vehicleoption'])) {
			foreach($data['vehicleoption'] as $vehicleoption)
			{
				$vo = VehicleOption::find($vehicleoption);

				$reservation->vehicleoptions()->save($vo);
			}
		} 

		return Redirect::to('/reservation/edit/' . $data['id'])->with('success', 'De reservering is succesvol bijgewerkt.');	
	}

	public function getDelete($id) 
	{
		$reservation = Reservation::find($id);
		$reservation->delete();

		return Redirect::to('/admin#reservations')->with('success', 'De reservering is succesvol verwijderd.');
	}

	public function getSuccess() 
	{
		return View::make('reservation.success');
	}
}