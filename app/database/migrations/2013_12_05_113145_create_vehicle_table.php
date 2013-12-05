<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicles', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('categoryid');
			$table->string('brand', 255);
			$table->string('model', 255);
			$table->integer('milage');
			$table->string('licenseplate', 255);
			$table->integer('usage');
			$table->string('comment', 255);
			$table->string('color', 255);
			$table->double('hourlyrate', 255);
			$table->integer('vehiclecategoryid');
			$table->integer('vehiclereviewid');
			$table->integer('vehicleoptionsid');
			$table->integer('vehicledamageid');
			$table->boolean('locked');

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
		Schema::drop('vehicles');
	}

}