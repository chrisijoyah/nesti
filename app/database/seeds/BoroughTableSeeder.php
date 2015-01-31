<?php

class BoroughTableSeeder extends Seeder {

	public function run()
	{
		DB::table('boroughs')->delete();

		DB::table('boroughs')->insert(array(
			array('name' => 'Camden'),
			array('name' => 'Greenwich'),
			array('name' => 'Hackney'),
			array('name' => 'Hammersmith'),
			array('name' => 'Islington'),
			array('name' => 'Kensington and Chelsea'),
			array('name' => 'Lambeth'),
			array('name' => 'Lewisham'),
			array('name' => 'Southwark'),
			array('name' => 'Tower Hamlets'),
			array('name' => 'Wandsworth'),
			array('name' => 'Westminster'),
			array('name' => 'Barking'),
			array('name' => 'Barnet'),
			array('name' => 'Bexley'),
			array('name' => 'Brent'),
			array('name' => 'Bromley'),
			array('name' => 'Croydon'),
			array('name' => 'Ealing'),
			array('name' => 'Enfield'),
			array('name' => 'Haringey'),
			array('name' => 'Harrow'),
			array('name' => 'Havering'),
			array('name' => 'Hillingdon'),
			array('name' => 'Hounslow'),
			array('name' => 'Kingston upon Thames'),
			array('name' => 'Merton'),
			array('name' => 'Newham'),
			array('name' => 'Redbridge'),
			array('name' => 'Richmond upon Thames'),
			array('name' => 'Sutton'),
			array('name' => 'Waltham Forest'),
		));

		for ($i = 1; $i <= 10; $i++) {
			DB::table('borough_user')->insert(array(
				array('user_id' => $i, 'borough_id' => 1),
				array('user_id' => $i, 'borough_id' => 2),
				array('user_id' => $i, 'borough_id' => 5),
				array('user_id' => $i, 'borough_id' => 7),
			));
		}


	}
}

 
 	 	
  	 	
 	
	
 	 	
 	 	
 	 	
 	 	
 	 	
 	 	
 	 	
 	 	
 	 	
 	 	
 	 	
 	 	

 	 	
 	 	
 	 	

 	 	
 	 	 		

 	 	

 	 	
 	 	
 	 	
 	
		