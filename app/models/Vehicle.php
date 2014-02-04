<?php

/**
 * The vehicle model.
 * @author Vincent van der Linden and Deam Kop
 */
class Vehicle extends Eloquent {

	/**
	 * Table name.
	 * @var string
	 */
	protected $table = 'vehicles';

	/**
	 * Create link with vehicle category id.
	 * @return void
	 */
	public function category() 
	{
		return $this->belongsTo('VehicleCategory', 'vehiclecategoryid');
	}

	/**
	 * Create link with review.
	 * @return void
	 */
	public function review()
	{
		return $this->hasMany('review');
	}
}