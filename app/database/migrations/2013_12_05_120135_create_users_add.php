<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAdd extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('username', 32);
			$table->string('password', 64);
			$table->string('email', 320);
			$table->string('firstname', 320);
			$table->string('lastname', 320);
			$table->string('addresslineone', 320);
			$table->string('addresslinetwo', 320);
			$table->string('city', 320);
			$table->string('zipcode', 320);
			$table->string('country', 320);
			$table->integer('phonenumber');
			$table->string('licensenumber', 320);
			$table->string('passportnumber', 320);
			$table->string('kvknumber', 320);
			$table->string('vatnumber', 320);
			$table->boolean('business');
			$table->integer('userroleid');

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
	}

}