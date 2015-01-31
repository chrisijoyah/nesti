<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('avatar');
			$table->string('name');
			$table->integer('age');
			$table->enum('gender', ['male', 'female']);
			$table->string('occupation');
			$table->text('description');
			$table->integer('budget');
			$table->integer('role_id');
			$table->string('email');
			$table->string('password');
			$table->date('available_from');
			$table->integer('minimum_term');
			$table->integer('maximum_term');
			$table->enum('property_type', ['flat', 'house', 'any']);
			$table->string('activation_token');
			$table->boolean('activated');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
