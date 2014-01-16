<?php

class General extends Eloquent {

	protected $table = 'general';

	public static function skin() 
	{
		$general = General::find(1);

		return $general->skin;
	}

	public static function latestnews() 
	{
		$general = General::find(1);

		return $general->latestnews;
	}

	public static function latestnewsenglish() 
	{
		$general = General::find(1);

		return $general->latestnewsenglish;
	}
}