<?php

class Review extends Eloquent {

	protected $table = 'reviews';

	public function user()
	{
		return $this->belongsTo('user', 'userid');
	}

	public function vehicle()
	{
		return $this->belongsTo('vehicle', 'vehicleid');
	}

	public function getTimeagoAttribute()
	{
	  	//$date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();

		setLocale(LC_TIME, 'Dutch');
		$date = Str::title($this->created_at->formatLocalized('%A %d %B %Y'));

		return $date;
	}

	public static function getHighReviews()
	{
		$review = Review::where('vehicleid' , '=', '0')->orderby(DB::raw('RAND() * 999'))->paginate(3);
		
		return $review;
	}
}