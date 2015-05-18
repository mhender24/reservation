<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('date', function($table){
			$table->increments('id');
			$table->timestamp('date');
			$table->smallInteger('counter');
			$table->smallInteger('interval');
			$table->smallInteger('max');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('date');
	}

}
