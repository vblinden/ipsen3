<?php

class Vehicle extends Eloquent {

	protected $table = 'vehicles';


	public function category() 
	{
		return $this->belongsTo('VehicleCategory', 'vehiclecategoryid');
	}

	public function review()
	{
		return $this->hasMany('review');
	}
}