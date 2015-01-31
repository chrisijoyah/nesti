<?php

class RoleTableSeeder extends Seeder {

	public function run()
	{
		DB::table('roles')->delete();

		DB::table('roles')->insert(array(
			array('name' => 'Tenant'),
			array('name' => 'Landlord'),
			array('name' => 'Agency'),
			array('name' => 'Admin'),
		));
	}
}