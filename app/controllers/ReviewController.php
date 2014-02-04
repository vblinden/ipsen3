<?php

/**
 * Handles all the get and post calls that are tied with review. 
 * @author Deam Kop
 */
class ReviewController extends BaseController {

	public function __construct() 
	{
		// Check if user is administrator.
		$this->beforeFilter('auth.admin', array(
			'except' => array('getIndex', 'postAdd')
		));
	}

	/**
	 * Returns the review index view.
	 * @return view
	 */
	public function getIndex()
	{
		// Get 15 reviews and save them.
		$reviews = Review::paginate(15);

		// Return view.
		return View::make('review.index', array('reviews' => $reviews));
	}

	/**
	 * Creates a review.
	 * @return redirect
	 */
	public function postAdd()
	{
		// Save all the input data.
		$data = Input::all();

		// Create a new review and asign all the values.
		$review = new Review();
		$review->vehicle_id = $data['vehicleid'];
		$review->user_id = Auth::user()->id;
		$review->comment = $data['comment'];
		$review->rating = $data['rating'];

		// Check the rating, if it's 0, then we say it's 1 star.
		if ($data['rating'] == 0) {
			$review->rating = 1;
		} else {
			$review->rating = $data['rating'];
		}

		// Save the review.
		$review->save();

		// Redirect the user with a message.
		return Redirect::to('/vehicle/detail/' . $data['vehicleid'])->with('success', 'De review is succesvol aangemaakt.');
	}

	/**
	 * Return the edit review view.
	 * @param  var $id The review id.
	 * @return view
	 */
	public function getEdit($id)
	{
		// Get the review that the user wants to edit.
		$review = Review::find($id);

		// Returns a view.
		return View::make('review.edit', array('review' => $review));
	}

	/**
	 * Edits the review.
	 * @return redirect
	 */
	public function postEdit()
	{
		// Get all the data.
		$data = Input::all();

		// Find the review.
		$review = Review::find($data['id']);

		// Change the values.
		$review->comment = $data['comment'];

		if ($data['rating'] != 0) {
			$review->rating = $data['rating'];
		} 

		// Save.
		$review->save();

		// Redirect the user with a message.
		return Redirect::to('/review/edit/'.$data['id'])->with('success', 'De review is succesvol bijgewerkt.');
	}

	/**
	 * Deletes a review.
	 * @param  var $id The review id.
	 * @return redirect
	 */
	public function getDelete($id) 
	{
		// Find the review and delete it.
		$review = Review::find($id);
		$review->delete();

		// Redirect the user with a message.
		return Redirect::to('/admin#review')->with('success', 'De review is succesvol verwijderd.');
	}
}