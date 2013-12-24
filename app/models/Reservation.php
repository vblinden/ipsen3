<?php

class Reservation extends Eloquent {

	protected $table = 'reservation';

	public function vehicleoptions()
	{
		return $this->belongsToMany('VehicleOption');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function vehicle()
	{
		return $this->belongsTo('Vehicle');
	}

	public function invoice()
	{
		return $this->hasOne('Invoice');
	}

}