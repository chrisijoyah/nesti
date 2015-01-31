<?php

class InterestTableSeeder extends Seeder {

	public function run()
	{
		DB::table('interests')->delete();

		DB::table('interests')->insert(array(
			array('name' => 'Films'),
			array('name' => 'Reading'),
			array('name' => 'Art'),
			array('name' => 'Music'),
		));
	

		for ($i = 1; $i <= 10; $i++) {
			DB::table('interest_user')->insert(array(
				array('user_id' => $i, 'interest_id' => 1),
				array('user_id' => $i, 'interest_id' => 2),
				array('user_id' => $i, 'interest_id' => 4),
			));
		}


	}


}