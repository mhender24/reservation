<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservation', function($table){
			$table->increments('id');
			$table->unsignedInteger('date_id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('phone_number');
			$table->string('email')->nullable();
			$table->text('notes')->nullable();
			$table->integer('size');
			$table->foreign('date_id')->references('id')->on('date');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reservation');
	}
}