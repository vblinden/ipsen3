<?php

/**
 * The reservation model.2
 * @author Vincent van der Linden
 */
class Reservation extends Eloquent {

	/**
	 * Table name.
	 * @var string
	 */
	protected $table = 'reservation';

	/**
	 * Create link with vehicle options.
	 * @return void
	 */
	public function vehicleoptions()
	{
		return $this->belongsToMany('VehicleOption');
	}

	/**
	 * Create link with user.
	 * @return void
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

	/**
	 * Create link with vehicle.
	 * @return void
	 */
	public function vehicle()
	{
		return $this->belongsTo('Vehicle');
	}

	/**
	 * Create link with invoices.
	 * @return void
	 */
	public function invoice()
	{
		return $this->hasOne('Invoice');
	}

}