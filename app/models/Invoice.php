<?php

class Invoice extends Eloquent {

	protected $table = 'invoices';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function vehicle()
	{
		return $this->belongsTo('Vehicle');
	}

	public function reservation()
	{
		return $this->hasOne('reservation');
	}

}