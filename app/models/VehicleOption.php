<?php

class VehicleOption extends Eloquent {

	protected $table = 'vehicleoptions';

	public function reservation() 
	{
		$this->belongsToMany('Reservation');
	}

}