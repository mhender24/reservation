<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model {

	protected $guarded = ['id'];
	protected $fillable = ['date', 'counter', 'interval', 'max'];

	

}
