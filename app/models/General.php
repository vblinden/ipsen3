<?php

/**
 * General model.
 * @author Vincent van der Linden
 */
class General extends Eloquent {

	/**
	 * Table name
	 * @var string
	 */
	protected $table = 'general';

	/**
	 * Returns the vat value.
	 * @return void
	 */
	public static function vat()
	{
		$general = General::find(1);

		return $general->vat;
	}

	/**
	 * Return the skin value.
	 * @return void
	 */
	public static function skin() 
	{
		$general = General::find(1);

		return $general->skin;
	}

	/**
	 * Return the dutch latest news value.
	 * @return void
	 */
	public static function latestnews() 
	{
		$general = General::find(1);

		return $general->latestnews;
	}

	/**
	 * Return the english latest news value.
	 * @return void
	 */
	public static function latestnewsenglish() 
	{
		$general = General::find(1);

		return $general->latestnewsenglish;
	}
}