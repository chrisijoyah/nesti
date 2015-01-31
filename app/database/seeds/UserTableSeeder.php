<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create();
		$faker->seed(1234);

		DB::table('users')->delete();

		$occupations = ['Graphic Designer', 'Web Developer', 'Content Analyst', 'Recruitment Consultant', 'Investment Banker'];
		$gender = ['male', 'female'];
		$budget = [400, 450, 500, 550, 600, 650, 700, 750, 800, 850, 900, 950, 1000, 1200, 1500];
		$property_type = ['flat', 'house', 'any'];

		$description = "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultrices facilisis mattis. Donec nec dui blandit, pellentesque ligula a, placerat lacus. Nulla odio mi, porttitor eu tincidunt nec, mollis ut sapien. Pellentesque congue dictum sagittis. Nam facilisis tempus elit. Fusce cursus eros et quam rutrum, vitae feugiat purus feugiat.</p>
							<p>Vivamus rhoncus malesuada finibus. Proin eu enim quis augue egestas convallis. Ut eu dui tincidunt, ultrices nisi eget, porta est. Vestibulum mattis malesuada sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>";
		
		// Create Tenants
		for ($i = 1; $i <= 10; $i++) {
			$first_name = $faker->firstName;
			$email = strtolower($first_name.'@nesti.co.uk');
			$avatar = '/assets/avatars/'.$i.'.jpg';

			User::create(array(
				'avatar'      => $avatar,
				'name'  => $first_name,
				'description' => $description,
				'email'       => $email,
				'password'    => Hash::make('password'),
				'occupation'  => $occupations[rand(0,4)],
				'role_id'	  => 1,
				'age'		  => rand(18,35),
				'budget'	  => $budget[rand(0,14)],
				'gender'      => $gender[rand(0,1)],
				'available_from' => date('Y-m-d'),
				'minimum_term' => 6,
				'maximum_term' => 24,
				'property_type' => $property_type[rand(0,2)],
			));

			// Assign roles
			DB::table('role_user')->insert(array(
				'role_id' => 1,
				'user_id' => $i,
			));

		}

		// Create Landlords
		for ($i = 11; $i <= 15; $i++) {
			$first_name = $faker->firstName;
			$email = strtolower($first_name.'@nesti.co.uk');
			$avatar = '/assets/avatars/'.$i.'.jpg';

			User::create(array(
				'avatar'      => $avatar,
				'name'  => $first_name,
				'description' => $description,
				'email'       => $email,
				'password'    => Hash::make('password'),
				'role_id'		  => 2,
			));

			// Assign roles
			DB::table('role_user')->insert(array(
				'role_id' => 2,
				'user_id' => $i,
			));
		}

		// Create Agencies
		for ($i = 16; $i <= 19; $i++) {
			$company = $faker->company;
			$email = strtolower($company.'@nesti.co.uk');
			$avatar = '/assets/avatars/'.$i.'.jpg';

			User::create(array(
				'avatar'      => $avatar,
				'name'  => $company,
				'description' => $description,
				'email'       => $email,
				'password'    => Hash::make('password'),
				'role_id'		  => 3,
			));

			// Assign roles
			DB::table('role_user')->insert(array(
				'role_id' => 3,
				'user_id' => $i,
			));
		}


		User::create(array(
			'name'  => 'Chris',
			'description' => $description,
			'avatar'      => '/assets/avatars/chris.jpg',
			'email'       => 'chrisijoyah@gmail.com',
			'password'    => Hash::make('password'),
			'occupation'  => $occupations[rand(0,4)],
			'role_id'     => 1,
			'age'		  => rand(18,35),
			'gender'      => $gender[0],
			'budget'	  => $budget[rand(0,14)],
			'available_from' => date('Y-m-d'),
			'minimum_term' => 6,
			'maximum_term' => 24,
			'property_type' => $property_type[rand(0,2)],
		));

		// Assign roles
		DB::table('role_user')->insert(array(
			'role_id' => 1,
			'user_id' => 20,
		));

		DB::table('amenity_user')->insert(array(
			array('user_id' => 20, 'amenity_id' => 1),
			array('user_id' => 20, 'amenity_id' => 2),
			array('user_id' => 20, 'amenity_id' => 5),
			array('user_id' => 20, 'amenity_id' => 7),
		));


		DB::table('borough_user')->insert(array(
			array('user_id' => 20, 'borough_id' => 1),
			array('user_id' => 20, 'borough_id' => 2),
			array('user_id' => 20, 'borough_id' => 5),
			array('user_id' => 20, 'borough_id' => 7),
		));


		DB::table('language_user')->insert(array(
			array('user_id' => 20, 'language_id' => 1),
			array('user_id' => 20, 'language_id' => 2),
			array('user_id' => 20, 'language_id' => 3),
		));

		DB::table('preference_user')->insert(array(
			array('user_id' => 20, 'preference_id' => 1),
			array('user_id' => 20, 'preference_id' => 2),
			array('user_id' => 20, 'preference_id' => 5),
			array('user_id' => 20, 'preference_id' => 7),
		));

		DB::table('interest_user')->insert(array(
			array('user_id' => 20, 'interest_id' => 1),
			array('user_id' => 20, 'interest_id' => 2),
			array('user_id' => 20, 'interest_id' => 4),
		));

	}
}