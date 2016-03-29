<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

/*Eloquent ORM, Object Relation Model*/
class User extends Eloquent implements UserInterface, RemindableInterface {

	public $timestamps = false;

	protected $fillable = ['U_firstname', 'U_lastname', 'U_username', 'U_password','U_email'];

	

	public $errors;

	use UserTrait, RemindableTrait;

	protected $primaryKey = 'U_username';

	public $rules;


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

	public function isValid($cur_user, $update = '')
	{
		$this->rules = array (
			'U_username'  => 'required|unique:users,U_username,'.$cur_user.',U_username',
			'U_password'  => 'required|min:8',
			'U_firstname' => 'required',
			'U_lastname'  => 'required',
			'U_email' 	  => 'required|email|unique:users,U_email,'.$cur_user.',U_username',
			'U_website'   => 'regex:"https?://.+"',
			'U_facebook'  => 'regex:"https?://.+"',
			'U_twitter'   => 'regex:"https?://.+"',
			'U_youtube'   => 'regex:"https?://.+"',
			'U_website'   => 'regex:"https?://.+"',
			'U_linkedin'  => 'regex:"https?://.+"',
			'U_google_plus' => 'regex:"https?://.+"'
		);

		if($update != '')
		{
			$this->rules['U_profile_image'] = 'image';
		}
		$messages = array('required' => 'Este campo es obligatorio',
							'unique' => 'Este campo ya esta registrado con otro usuario.',
							'email' => 'Incorrecto formato de correo electrónico',
							'min' => 'Este campo requiere un mínimo de :min caracteres',
							'regex' => 'Este campo requiere que pongas http:// o https:// al principio',
							'image' => 'La imagen tiene que ser formato jpeg, jpg o png');
		$validation = Validator::make($this->attributes, $this->rules, $messages);

		if ($validation->passes()) return true;

		$this->errors = $validation->messages();
		return false;
	}

	public function profiles()
    {
        return $this->hasMany('Profile');
    }

}
