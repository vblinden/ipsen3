<?php

/**
 * The invoice model.
 * @author Deam Kop and Vincent van der Linden
 */
class Invoice extends Eloquent {

	/**
	 * Table name.
	 * @var string
	 */
	protected $table = 'invoices';

	/**
	 * Create link with users.
	 * @return void
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

	/**
	 * Create link with vehicles.
	 * @return void
	 */
	public function vehicle()
	{
		return $this->belongsTo('Vehicle');
	}

	/**
	 * Create link with reservations.
	 * @return void
	 */
	public function reservation()
	{
		return $this->hasOne('reservation');
	}

}