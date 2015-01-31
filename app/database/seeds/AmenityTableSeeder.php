<?php

class AmenityTableSeeder extends Seeder {

	public function run()
	{
		DB::table('amenities')->delete();

		DB::table('amenities')->insert(array(
			array('name' => 'Furnished'),
			array('name' => 'Parking'),
			array('name' => 'Garage'),
			array('name' => 'Living Room'),
			array('name' => 'Wireless Internet'),
			array('name' => 'Internet'),
			array('name' => 'Washing Machine'),
			array('name' => 'Garden'),
			array('name' => 'Disabled Access'),
			array('name' => 'En Suite'),
			array('name' => 'Single Bed'),
			array('name' => 'Double Bed'),
		));

		// Add amenities to properties
		for($i=1;$i <= 9;$i++){
			$listing = Listing::find($i);
			$listing->amenities()->attach([1, 3, 5, 9, 10, 12]);
		}


		for ($i = 1; $i <= 10; $i++) {
			DB::table('amenity_user')->insert(array(
				array('user_id' => $i, 'amenity_id' => 1),
				array('user_id' => $i, 'amenity_id' => 2),
				array('user_id' => $i, 'amenity_id' => 5),
				array('user_id' => $i, 'amenity_id' => 7),
			));
		}

	}
}