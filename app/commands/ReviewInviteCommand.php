<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Sends a review invite to the user who needs it (based on the five day usage time).
 * @author Vincent van der Linden
 */
class ReviewInviteCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'command:reviewinvite';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Sends a review invite to the user who needs it.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		// Get all reservations from the database.
		$reservations = Reservation::all();

		foreach ($reservations as $reservation) {
			// Convert date string to Carbon instance.
			$date = Carbon::parse($reservation->enddate);

			// Check if there are reservations that are older than five days. If 
			// so then send an email to invite the user to write an review.
			if (Carbon::now()->diffInDays($date) <= 5) {

				// Check if we already sended an email to the user.
				if ($reservation->sended_review_mail == 0) {
					// Get user 
					$user = User::find($reservation->user_id);

					// Send mail.
					Mail::send('emails.reviewinvite', array('user' => $user, 'reservation' => $reservation), function($message) use ($user)
					{
						$message->to($user->email)->subject('Bedankt voor uw vertrouwen in LeenMeij!');
					});

					// DEBUG: Print out console message.
					// $this->info('Sended e-mail to: ' . $user->email);

					// Set the sended_review_email to 1 (aka sended a review email to the user).
					$reservation->sended_review_mail = 1;
					$reservation->save();
				}
			}
		}

		// Tell console that everything went ok.
		$this->info('Executed command, everything went ok.');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('days', InputArgument::OPTIONAL, 'How many days.'),
			);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
			);
	}

}