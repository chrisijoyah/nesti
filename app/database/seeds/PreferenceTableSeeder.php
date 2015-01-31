<?php

class PreferenceTableSeeder extends Seeder {

	public function run()
	{
		DB::table('preferences')->delete();

		DB::table('preferences')->insert(array(
			array('name' => 'Male'),
			array('name' => 'Female'),
			array('name' => 'Smoker'),
			array('name' => 'Non Smoker'),
			array('name' => 'Pets Allowed'),
			array('name' => 'No Pets'),
			array('name' => 'References'),
			array('name' => 'Professional'),
			array('name' => 'Couples'),
			array('name' => 'No Couples'),
		));

		// Add preferences to properties
		for($i=1;$i <= 9;$i++){
			$listing = Listing::find($i);
			$listing->preferences()->attach([1, 3, 5, 7, 8,]);
		}

		for ($i = 1; $i <= 10; $i++) {
			DB::table('preference_user')->insert(array(
				array('user_id' => $i, 'preference_id' => 1),
				array('user_id' => $i, 'preference_id' => 2),
				array('user_id' => $i, 'preference_id' => 5),
				array('user_id' => $i, 'preference_id' => 7),
			));
		}

	}
}

 
 	 	
  	 	
 	
	
 	 	
 	 	
 	 	
 	 	
 	 	
 	 	
 	 	
 	 	
 	 	
 	 	
 	 	
 	 	

 	 	
 	 	
 	 	

 	 	
 	 	 		

 	 	

 	 	
 	 	
 	 	
 	
		