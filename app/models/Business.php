<?php

class Business extends Eloquent {

	public $timestamps = false;

	//protected $fillable = ['U_username', 'U_password'];

	protected $primaryKey = 'B_ID';
	protected $table = 'businesses';

	public $errors;

	public $rules;

	public function isValid($cur_doctor)
	{
		$this->rules = array (
			'b_name'  		=> 'required',
			'b_address' 	=> 'required',
			'b_telephone'  	=> 'required',
			'b_email' 	  	=> 'required|email|unique:businesses,b_email,'.$cur_doctor.',B_ID',
			'b_introduction'=> 'required',
			'b_description' => 'required'
		);
		$messages = array('required' => 'Este campo es obligatorio',
							'unique' => 'Este campo ya esta en otro negocio',
							'email' => 'Incorrecto formato de correo electrónico');
		$validation = Validator::make($this->attributes, $this->rules, $messages);

		if ($validation->passes()) return true;

		$this->errors = $validation->messages();
		return false;
	}

}
