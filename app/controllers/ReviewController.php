<?php

class ReviewController extends BaseController {

	public function __construct() 
	{
		$this->beforeFilter('auth', array(
			'except' => 'getIndex'
		));
	}

	public function getIndex()
	{
		$reviews = Review::paginate(15);

		return View::make('review.index', array('reviews' => $reviews));
	}

	public function postAdd()
	{
		// Save all the input data.
		$data = Input::all();

		$review = new Review();
		$review->vehicleid = $data['vehicleid'];
		$review->userid = Auth::user()->id;
		$review->comment = $data['comment'];
		$review->rating = $data['rating'];

		if ($data['rating'] == 0) {
			$review->rating = 1;
		} else{
			$review->rating = $data['rating'];
		}

		$review->save();

		return Redirect::to('/vehicle/detail/' . $data['vehicleid'])->with('success', 'De review is succesvol aangemaakt.');
	}

	public function getEdit($id)
	{
		$review = Review::find($id);

		return View::make('review.edit', array('review' => $review));
	}

	public function postEdit()
	{
		$data = Input::all();

		$review = Review::find($data['id']);
		$review->comment = $data['comment'];
		$review->rating = $data['rating'];

		$review->save();

		return Redirect::to('/review/edit/'.$data['id'])->with('success', 'De review is succesvol bijgewerkt.');
	}

	public function getDelete($id) 
	{
		$review = Review::find($id);
		$review->delete();

		return Redirect::to('/admin#review')->with('success', 'De review is succesvol verwijderd.');
	}
}