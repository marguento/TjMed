<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

/*Eloquent ORM, Object Relation Model*/
class User extends Eloquent implements UserInterface, RemindableInterface {

	public $timestamps = false;

	protected $fillable = ['U_firstname', 'U_lastname', 'U_username', 'U_password', 'U_email'];

	public $rules = [
		'U_username'  => 'required',
		'U_password'  => 'required',
		'U_firstname' => 'required',
		'U_lastname'  => 'required',
		'U_email' 	  => 'required'
	];

	public $errors;

	use UserTrait, RemindableTrait;

	protected $primaryKey = 'U_username';



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('U_password', 'remember_token');

	public function isValid()
	{
		$validation = Validator::make($this->attributes, $this->rules);

		if ($validation->passes()) return true;

		$this->errors = $validation->messages();
		return false;
	}

}
