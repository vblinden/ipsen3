<?php

use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create currencies
		Schema::create('currencies', function($table)
		{
		    $table->increments('id');
		    $table->string('currency', 3);
		    $table->decimal('value', 10, 9);
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
		//
		Schema::dropIfExists('currencies');
	}

}