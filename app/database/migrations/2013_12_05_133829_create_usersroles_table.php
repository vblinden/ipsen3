<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersrolesTable extends Migration {

	public function up()
	{
		Schema::create('userroles', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('role');

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
		Schema::drop('userroles');
	}

}