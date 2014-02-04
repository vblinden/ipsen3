<?php

/**
 * The role model.
 * @author Vincent van der Linden
 */
class Role extends Eloquent {

	/**
	 * We don't need the timestamps with this model.
	 * @var boolean
	 */
	public $timestamps = false;

	/**
	 * Table name.
	 * @var string
	 */
	protected $table = 'roles';

}