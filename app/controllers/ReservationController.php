<?php

class ReservationController extends BaseController {

	public function __construct() 
	{
		$this->beforeFilter('auth', array(
			'except' => 'getIndex'
		));
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

		$reservation->save();

		foreach($data['vehicleoption'] as $vehicleoption)
		{
			$vo = VehicleOption::find($vehicleoption);

			$reservation->vehicleoptions()->save($vo);
		}

		return Redirect::to('/reservation/success')->with('success', 'De reservering is succesvol verstuurd.');
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

		$reservation->save();

		foreach($data['vehicleoption'] as $vehicleoption)
		{
			$vo = VehicleOption::find($vehicleoption);

			$reservation->vehicleoptions()->save($vo);
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