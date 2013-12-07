<?php

class Vehicle extends Eloquent {

	protected $table = 'vehicles';


	public function category() 
	{
		return $this->belongsTo('VehicleCategory', 'vehiclecategoryid');
	}
}