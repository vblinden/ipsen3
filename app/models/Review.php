<?php

/** 
 * The review model.
 * @author Deam Kop
 */
class Review extends Eloquent {

	/**
	 * Table name.
	 * @var string
	 */
	protected $table = 'reviews';

	/**
	 * Create link with users.
	 * @return void
	 */
	public function user()
	{
		return $this->belongsTo('user', 'user_id');
	}

	/**
	 * Create link with vehicle.
	 * @return void
	 */
	public function vehicle()
	{
		return $this->belongsTo('vehicle', 'vehicle_id');
	}

	/**
	 * Returns a human readable date.
	 * @return string
	 */
	public function getTimeagoAttribute()
	{
	  	//$date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();

		setLocale(LC_TIME, 'Dutch');
		$date = Str::title($this->created_at->formatLocalized('%A %d %B %Y'));

		return $date;
	}

	/**
	 * Returns the most highest rated reviews.
	 * @return void
	 */
	public static function getHighReviews()
	{
		$review = Review::where('vehicle_id' , '=', '0')->orderby(DB::raw('RAND() * 999'))->paginate(3);
		
		return $review;
	}
}