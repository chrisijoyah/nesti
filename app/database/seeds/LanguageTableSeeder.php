<?php

class LanguageTableSeeder extends Seeder {

	public function run()
	{
		DB::table('languages')->delete();

		DB::table('languages')->insert(array(
			array('name' => 'English'),
			array('name' => 'French'),
			array('name' => 'German'),
			array('name' => 'Spanish'),
		));

		for ($i = 1; $i <= 10; $i++) {
			DB::table('language_user')->insert(array(
				array('user_id' => $i, 'language_id' => 1),
				array('user_id' => $i, 'language_id' => 2),
				array('user_id' => $i, 'language_id' => 4),
			));
		}


	}
}