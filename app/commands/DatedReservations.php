<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class DatedReservations extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'command:datedreservations';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Checks which reservations are dated and removes them.';

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
		$reservations = Reservation::all();

		foreach ($reservations as $reservation) {
			// Convert date string to Carbon instance.
			$date = Carbon::parse($reservation->startdate);

			// Check if the reservations is picked up to late.
			if (Carbon::now()->diffInDays($date) <= 1) {

				// If the vehicle isn't picked up, delete it.
				if ($reservation->picked_up == 0) {

					// Delete reservation.
					$reservation->delete();

					// DEBUG: Print out console command.
					$this->info('Deleted reservation with id: ' . $reservation->id);
				}
			}
		}

		// Tell the console that everything went ok.
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
			array('example', InputArgument::OPTIONAL, 'An example argument.'),
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