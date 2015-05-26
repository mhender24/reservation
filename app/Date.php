<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model {

	protected $guarded = ['id'];
	protected $fillable = ['date', 'counter', 'interval', 'max'];

	
	private static $rules = array(
		'date' => 'required|date',
		'counter' =>	'required|numeric',
		'interval' =>	'required|numeric',
		'max' =>	'required|numeric'
		);

	public static function validate($date){
		return Validator::make($data, static::$rules);
	}
}
