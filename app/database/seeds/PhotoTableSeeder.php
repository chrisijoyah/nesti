<?php

class PhotoTableSeeder extends Seeder {

	public function run()
	{
		DB::table('photos')->delete();

		for ($i = 1; $i <= 9; $i++) {
			Photo::create(array(
				'url' => 'assets/rooms/'.rand(1,12).'.jpg',
			));		
		}

		for ($i = 1; $i <= 9; $i++) {
			DB::table('listing_photo')->insert(array(
				'listing_id' => $i,
				'photo_id'         => $i,
			));
		}
	}
}