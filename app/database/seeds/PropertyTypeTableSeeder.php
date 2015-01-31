<?php

class PropertyTypeTableSeeder extends Seeder {

	public function run()
	{
		DB::table('property_type')->delete();

		DB::table('property_type')->insert(array(
			array('name' => 'House'),
			array('name' => 'Flat'),
			array('name' => 'Any'),
		));
	}
}