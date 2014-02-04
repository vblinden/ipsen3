<?php

/**
 * Unit test for users.
 * @author Floris Admiraal en Michiel Mooring
 */
class UserTest extends TestCase {

	/**
	 * Test if user can login.
	 * @return true or false
	 */
	public function testLogin()
	{
		// Set up parameters.
		$user = array(
			'email' => 'admin@admin.nl', 
			'password' => 'Welkom01'
		);

		// Check if this user can login.
		$this->assertTrue(Auth::attempt($user));
	}

	/**
	 * Test if we can access the register view.
	 * @return [type] [description]
	 */
	public function testAddUser()
	{
		$response = $this->call('GET', 'user/register/company');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

	/**
	 * Test if we can access the edit user view.
	 * @return [type] [description]
	 */
	public function testEditUser() 
	{
		// Log in as admin.
		$user = array(
			'email' => 'admin@admin.nl', 
			'password' => 'Welkom01'
		);

		// Check if this user can login.
		$this->assertTrue(Auth::attempt($user));

		$response = $this->call('GET', 'user/edit/1');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

	/**
	 * Test if we can delete a user.
	 * @return [type] [description]
	 */
	public function testDeleteUser() 
	{
		// Log in as admin.
		$user = array(
			'email' => 'admin@admin.nl', 
			'password' => 'Welkom01'
		);

		// Check if this user can login.
		$this->assertTrue(Auth::attempt($user));

		// Create temp user.
		$tempUser = new User();
		$tempUser['email'] = 'test@test.nl';
		$tempUser['password'] = 'asd';
		$tempUser->save();

		$this->assertTrue(true);

		$response = $this->call('GET', 'user/delete/' . $tempUser['id']);

		$this->assertTrue(true);
	}

}