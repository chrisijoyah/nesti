<?php

class ListingTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create();

		DB::table('listings')->delete();

		$deposit = [400, 450, 500, 550, 600];
		$rent = [400, 450, 500, 550, 600, 650, 700, 750, 800, 850, 900, 950, 1000, 1200, 1500];

		for ($i = 11; $i <= 19; $i++) {
			$title = 'Large double bedroom all inclusive';
			$description = $faker->text(400);

			Listing::create(array(
				'title'             => $faker->text(100),
				'description'       => $description,
				'borough_id'        => rand(1,32),
				'rent'              => $rent[rand(0,14)],
				'deposit'           => $deposit[rand(0,4)],
				'minimum_term'      => 3,
				'maximum_term'      => 24,
				'location'          => 'London',
				'property_type_id'  => rand(1,2),
				'user_id'           => $i,
				'available_from'    => '2014-11-20',
				'created_at'        => $faker->dateTimeThisYear(),
			));		
		}
	}
}
