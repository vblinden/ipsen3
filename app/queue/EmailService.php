<?php

/**
 * This allows us to send mails later aka async.
 * @author Vincent van der Linden and Michiel Mooring
 */
class EmailService {

	/**
	 * Send register mail.
	 */
	public function register($job, $data) 
	{
		$user = $data['user'];

		// Send mail.
		Mail::send('emails.register', array('user' => $user), function($message) use ($user)
		{
			$message->to($user->email)->subject('Welkom bij LeenMeij!');
		});

		// Delete the job from the queue.
		$job->delete();
	}

	/**
	 * Send reservation mail.
	 */
	public function reservation($job, $data) 
	{
		$user = $data['user'];
		$reservation = $data['reservation'];
		$invoice = $data['invoice'];

		Mail::send('emails.reservation', array('user' => $user, 'reservation' => $reservation, 'invoice' => $invoice), function($message) use ($user)
		{
		    $message->to($user->email)->subject('Bedankt voor uw reservering!');
		});

		// Delete the job from the queue.
		$job->delete();
	}

	public function reviewinvite($job, $data) 
	{
		
	}
}