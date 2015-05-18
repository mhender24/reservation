<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {

	protected $guarded = ['id'];
	protected $fillable = ['date_id', 'first_name', 'last_name', 
							'phone_number', 'email', 'notes', 'size'];

}
