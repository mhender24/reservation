<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {

	protected $guarded = ['id'];
	protected $fillable = ['date_id', 'first_name', 'last_name', 
							'phone_number', 'email', 'notes', 'size'];

	private static $rules = array(
		'date_id' => 'required|numeric',
		'first_name' =>	'required|alpha_num',
		'last_name' =>	'required|alpha_num',
		'phone_number' =>	'required|numeric',   //needs regix
		'email' => 'email',  
		'size' =>	'required|numeric'
		);

	public static function validate($date){
		return Validator::make($data, static::$rules);
	}
}


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