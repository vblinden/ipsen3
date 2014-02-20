<?php

/**
 * The user role model.
 * @author Vincent van der Linden
 */
class UserRole extends Eloquent {

	/**
	 * We don't need the timestamps with this model.
	 * @var boolean
	 */
	public $timestamps = false;


	/**
	 * Table name.
	 * @var string
	 */
	protected $table = 'userroles';

}