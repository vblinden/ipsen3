<?php


class PriceConverter{


	/**
	*	returns a string with currencysymbol and formatted price.
	*/
	public static function convert($amount)
	{
		if(Session::get('leenmeij.currency'))
		{
			$currency = Session::get('leenmeij.currency');
		}
		else
		{
			$currency = 'EUR';
		}
		
		switch ($currency) {
			case 'EUR':
				$exchangeRate = DB::table('currencies')->where('currency', 'EUR')->pluck('value');
				$price = number_format( ($amount * $exchangeRate), 2, '.', '');
				return '&euro; '.$price;
				break;
			case 'USD':
				$exchangeRate = DB::table('currencies')->where('currency', 'USD')->pluck('value');
				$price = number_format( ($amount * $exchangeRate), 2, '.', '');
				return '$ '.$price;
				break;
			case 'GBP':
				$exchangeRate = DB::table('currencies')->where('currency', 'GBP')->pluck('value');
				$price = number_format( ($amount * $exchangeRate), 2, '.', '');
				return '&pound; '.$price;
				break;
			default:
				$exchangeRate = DB::table('currencies')->where('currency', 'EUR')->pluck('value');
				$price = number_format( ($amount * $exchangeRate), 2, '.', '');
				return '&euro; '.$price;
				break;
		}



		return 'price not calculated:'.$amount;
	}

	public static function getCurrencySymbol()
	{
		$currency = Session::get('leenmeij.currency');
		
		switch ($currency) {
			case 'EUR':
				return '&euro;';
				break;
			case 'USD':
				return '$';
				break;
			case 'GBP':
				return '&pound';
				break;
			default:
				return '&euro';
				break;
		}
	

		return '&euro;';
	}




}
