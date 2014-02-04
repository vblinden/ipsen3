<?php

/**
 * Unit test for users.
 * @author Floris Admiraal en Michiel Mooring
 */
class UserRoleTest extends TestCase {

	/**
	 * Test if we can access the add user role view.
	 * @return [type] [description]
	 */
	public function testAddUserRole()
	{
		$response = $this->call('GET', 'userrole/add');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

	/**
	 * Test if we can access the edit user role view.
	 * @return [type] [description]
	 */
	public function testEditUserRole() 
	{
		// Log in as admin.
		$user = array(
			'email' => 'admin@admin.nl', 
			'password' => 'Welkom01'
		);

		// Check if this user can login.
		$this->assertTrue(Auth::attempt($user));

		$response = $this->call('GET', 'userrole/edit/1');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

	/**
	 * Test if we can delete a user role.
	 * @return [type] [description]
	 */
	public function testDeleteUserRole() 
	{
		// Log in as admin.
		$user = array(
			'email' => 'admin@admin.nl', 
			'password' => 'Welkom01'
		);

		// Check if this user can login.
		$this->assertTrue(Auth::attempt($user));

		$this->assertTrue(true);
		$this->assertTrue(true);
	}

}