<?php

class General extends Eloquent {

	protected $table = 'general';

	public static function skin() 
	{
		$general = General::find(1);

		return $general->skin;
	}
}