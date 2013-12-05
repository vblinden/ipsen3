<?php

class UserTableSeeder extends Seeder
{

	public function run() 
	{
		DB::table('users')->delete();
		User::create(array(
			'username' => 'vblinden',
			'email' => 'vbvanderlinden@gmail.com',
			'password' => Hash::make('awesome')
		));
	}
}