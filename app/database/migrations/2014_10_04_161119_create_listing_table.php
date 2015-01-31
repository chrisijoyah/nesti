<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('listings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('reference');
			$table->string('title');
			$table->text('description');
			$table->integer('rent');
			$table->integer('deposit');
			$table->boolean('bills_included');
			$table->string('location');
			$table->string('borough_id');
			$table->date('available_from');
			$table->integer('minimum_term');
			$table->integer('maximum_term');
			$table->integer('male_count');
			$table->integer('female_count');
			$table->boolean('pets');
			$table->integer('user_id');
			$table->integer('property_type_id');
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
		Schema::drop('listings');
	}

}
