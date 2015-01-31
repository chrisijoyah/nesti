<?php

class MessageTableSeeder extends Seeder {

	public function run()
	{
		DB::table('messages')->delete();

		Message::create(array(
			'user_id'  => 2,
			'subject'  => 'Test message',
			'body'     => 'This is a test message.',
		));

	}
}