<?php

/**
 * The vehicle option model.
 * @author Deam Kop
 */
class VehicleOption extends Eloquent {

	/**
	 * Table name.
	 * @var string
	 */
	protected $table = 'vehicleoptions';

	/**
	 * Create link with reservations.
	 * @return var
	 */
	public function reservation() 
	{
		$this->belongsToMany('Reservation');
	}

}