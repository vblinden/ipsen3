<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclereviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehiclereviews', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('vehicleid');
			$table->integer('userid');
			$table->string('comment', 255);
			$table->integer('rating');
			$table->dateTime('date');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehiclereviews');
	}

}