<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->command->info('User table seeder!');

		$this->call('ListingTableSeeder');
		$this->command->info('Listing table seeded!');

		$this->call('PhotoTableSeeder');
		$this->command->info('Photo table seeded!');

		$this->call('BoroughTableSeeder');
		$this->command->info('Borough table seeded!');

		$this->call('AmenityTableSeeder');
		$this->command->info('Amenity table seeded!');

		$this->call('PreferenceTableSeeder');
		$this->command->info('Preference table seeded!');

		$this->call('MessageTableSeeder');
		$this->command->info('Message table seeded!');

		$this->call('RoleTableSeeder');
		$this->command->info('Message table seeded!');

		$this->call('PropertyTypeTableSeeder');
		$this->command->info('PropertyType table seeded!');

		$this->call('LanguageTableSeeder');
		$this->command->info('Language table seeded!');

		$this->call('InterestTableSeeder');
		$this->command->info('Interest table seeded!');
	}

}
