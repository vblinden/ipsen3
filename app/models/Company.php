<?php

/**
 * Company model
 * @author Vincent van der Linden
 */
class Company extends Eloquent {

	/**
	 * Table name
	 * @var string
	 */
	protected $table = 'companies';

	/**
	 * Relationship with users.
	 * @return void
	 */
	public function users()
	{
		return $this->belongsToMany('user', 'company_user');
	}
}