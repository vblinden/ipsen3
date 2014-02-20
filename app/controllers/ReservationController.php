<?php

/**
 * Handles all the reservations gets and posts calls.
 * @author Vincent van der Linden
 */
class ReservationController extends BaseController {

	public function __construct() 
	{
		// User must be logged in to create a reservation.
		$this->beforeFilter('auth');

		// User must be admin to do other things with the reservations.
		$this->beforeFilter('auth.admin', array(
			'except' => array('getIndex', 'postIndex', 'getMake', 'postMake', 'getPayment', 'getCheck', 'postSucces')
		));
	}

	/**
	 * Returns the reservation index view.
	 * @return view
	 */
	public function getIndex() 
	{
		return View::make('reservation.index', array('input' => 0));
	}

	/**
	 * Checks if the dates are valid and create's a reservation.
	 * @return view
	 */
	public function postIndex()
	{
		// Get all the data.
		$data = Input::all();

		// Set validator rules.
		$rules = array(
			'startdate' => 'required|date',
			'enddate' => 'required|date'
		);

		// Create a validator with the data and the rules we set above.
		$validator = Validator::make($data, $rules);

		// If the validator fails, return to page with error and with input (if there is any).
		if ($validator->fails()) {
			return Redirect::to('reservation/index')->with('failed', 'U moet een begin en eind datum opgeven en de datums moeten van een geldig datum formaat zijn. Probeer het opnieuw.')->withInput();
		}
		
		// Only get vehicles from the selected category.
		$vehicles = Vehicle::where('vehiclecategoryid', '=', $data['vehiclecategoryid'])->get();
		$reservations = Reservation::all();

		// Filter the vehicles.
		$vehicles = $vehicles->filter(function ($vehicle) use ($reservations, $data)
		{
			// Check every reservation.
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

		// Create cookie for dates, so we can use these later.
		$cookie = Cookie::forever('dates', array(
				'startdate' => $data['startdate'], 
				'enddate' => $data['enddate']));
		
		Cookie::queue($cookie);

		// Return a view with partial data.
		return View::make(
			'reservation.index', 
			array('input' => $data))->nest('child', 'reservation.availablevehicles', 
			array('vehicles' => $vehicles)
		);
	}

	/**
	 * Create a temp-reservation.
	 * @param  var $id The vehicle id.
	 * @return view
	 */
	public function getMake($id)
	{
		// Find the vehicle and vehicle options.
		$vehicle = Vehicle::find($id);
		$vehicleoptions = VehicleOption::all();

		// Return a view with the vehicle and vehicle options.
		return View::make('reservation.make', array('vehicle' => $vehicle, 'vehicleoptions' => $vehicleoptions));	
	}

	/**
	 * Create a final reservation.
	 * @return redirect
	 */
	public function postMake()
	{
		// Save all the input data.
		$data = Input::all();

		// Create new reservation and save the data.
		$reservation = new Reservation();
		$reservation->user_id = Auth::user()->id;
		$reservation->vehicle_id = $data['vehicleid'];
		$reservation->startdate = $data['startdate'];
		$reservation->enddate = $data['enddate'];
		$reservation->status = 0;

		// Save the reservation.
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

		// Redirect the user.
		return Redirect::to('/reservation/check/' . $reservation->id);
	}

	/**
	 * Returns the payment view.
	 * @return view
	 */
	public function getPayment()
	{
		return View::make('reservation.payment');
	}

	/**
	 * Returns the check view.
	 * @param  var $id The reservation id.
	 * @return view
	 */
	public function getCheck($id)
	{
		// Find the reservation.
		$reservation = Reservation::find($id);

		// Calculate the total price.
		$totalPrice = $reservation->vehicle->hourlyrate * 24;

		// Add each vehicle option price to the total price.
		foreach ($reservation->vehicleoptions as $vehicleoption) {
			$totalPrice += $vehicleoption->price * 24;
		}

		// Convert the two datetimes.
		$datetime1 = new DateTime($reservation->startdate);
		$datetime2 = new DateTime($reservation->enddate);
		$interval = $datetime1->diff($datetime2);

		// Mutliple the total price for days.
		$totalPrice = $totalPrice * $interval->format('%a');

		// Check if reservation times are two months ahead.
		if (Carbon::now()->diffInDays(Carbon::parse($reservation->startdate)) >= 60) {	
			$totalPrice = $totalPrice - ($totalPrice / 100) * 5;
		}

		// Calculate the VAT.
		$vat = $totalPrice / 100 * General::find(1)->vat;

		// Return a view, with information.
		return View::make('reservation.check', array(
			'reservation' => Reservation::find($id),
			'totalPrice' => $totalPrice,
			'vat' => $vat
		));
	}

	/**
	 * Returns the edit reservation view.
	 * @param  var $id The id of the reservation.
	 * @return view
	 */
	public function getEdit($id) 
	{
		return View::make('reservation.edit', array('reservation' => Reservation::find($id), 'invoice' => Invoice::find('reservation_id' . '=' . $id)));
	}

	/**
	 * Edits a reservation.
	 * @return redirect
	 */
	public function postEdit() 
	{
		// Save all the input data.
		$data = Input::all();

		// Find the reservation and change the values.
		$reservation = Reservation::find($data['id']);
		$reservation->startdate = $data['startdate'];
		$reservation->enddate = $data['enddate'];
		$reservation->status = 1;

		// Save the reservation.
		$reservation->save();

		// Get invoice from reservation id, and make sure we only get one.
		$invoice = Invoice::where('reservation_id', '=', $data['id'])->firstOrFail();

		// Update the invoice values.
		$invoice->startdate = Carbon::parse($data['startdate']);
		$invoice->enddate = Carbon::parse($data['enddate']);

		// Calculate new price.
		$totalPrice = $reservation->vehicle->hourlyrate * 24;

		// Add all vehicle options price to the total price.
		foreach ($reservation->vehicleoptions as $vehicleoption) {
			$totalPrice += $vehicleoption->price * 24;
		}

		// Covert the datetimes.
		$datetime1 = new DateTime($reservation->startdate);
		$datetime2 = new DateTime($reservation->enddate);
		$interval = $datetime1->diff($datetime2);

		// Calculate total price.
		$totalPrice = $totalPrice * $interval->format('%a');
	
		// Check if reservation times are two months ahead.
		if (Carbon::now()->diffInDays(Carbon::parse($reservation->startdate)) >= 60) {	
			$totalPrice = $totalPrice - ($totalPrice / 100) * 5;
		}

		// Calculate vat.
		$vat = $totalPrice / 100 * General::find(1)->vat;

		$invoice->price = $totalPrice;
		$invoice->total = $totalPrice + $vat;

		// Save the invoice.
		$invoice->save();

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

		// Redirect the user with message.
		return Redirect::to('/reservation/edit/' . $data['id'])->with('success', 'De reservering is succesvol bijgewerkt.');	
	}

	/**
	 * Deletes a reservation.
	 * @param  var $id The id of the reservation.
	 * @return redirect
	 */
	public function getDelete($id) 
	{
		// Get the reservation.
		$reservation = Reservation::find($id);

		// Delete it.
		$reservation->delete();

		// Redirect user with message.
		return Redirect::to('/admin#reservations')->with('success', 'De reservering is succesvol verwijderd.');
	}

	/**
	 * Saves the reservation and sends the confirmation email.
	 * @return view
	 */
	public function getSuccess()
	{
		return View::make('reservation.success');
	}

	/**
	 * Saves the reservation and sends the confirmation email.
	 * @return view
	 */
	public function postSucces()
	{
		// Get all the date from the view.
		$data = Input::all();

		// Decode the reservation data and convert to an object.
		$reservation = json_decode($data['reservation']);

		// Create new invoice.
		$invoice = new Invoice();

		// Asign all the values.
		$invoice->user_id = Auth::user()->id;
		$invoice->vehicle_id = $reservation->vehicle->id;
		$invoice->startdate = Carbon::parse($reservation->startdate);
		$invoice->enddate = Carbon::parse($reservation->enddate);
		$invoice->price = $data['price'];
		$invoice->total = $data['total'];
		$invoice->reservation_id = $reservation->id;

		// Save the invoice.
		$invoice->save();
		
		// Find user.
		$user = User::find($invoice->user_id);

		// Send mail.
		Queue::push('EmailService@reservation', array('user' => $user, 'reservation' => $reservation, 'invoice' => $invoice));

		// Create success view.
		return View::make('reservation.success');
	}
}