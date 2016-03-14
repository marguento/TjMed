<?php

class Banner extends Eloquent {

	public $timestamps = false;

	//protected $fillable = ['U_username', 'U_password'];

	protected $primaryKey = 'ID';
	protected $table = 'banners';

	public $errors;

	public $rules;

	public function isValid()
	{
		$this->rules = array (
			'image_esp'  	=> 'required|image',
			'image_eng' 	=> 'required|image'
		);

		$messages = array('required' => 'Este campo es obligatorio',
							'image' => 'La imagen tiene que ser formato jpeg, jpg o png');

		$validation = Validator::make($this->attributes, $this->rules, $messages);

		if ($validation->passes()) return true;

		$this->errors = $validation->messages();

		return false;
	}

}
