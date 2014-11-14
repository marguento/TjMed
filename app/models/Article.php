<?php

class Article extends Eloquent {

	public $timestamps = false;

	//protected $fillable = ['U_username', 'U_password'];

	protected $primaryKey = 'A_ID';
	protected $table = 'articles';

	public $errors;

	public $rules;

	public function isValid($update = '')
	{
		$this->rules = array (
			'A_title'  			=> 'required',
			'A_introduction' 	=> 'required',
			'A_content'  		=> 'required'
		);

		if($update != '')
		{
			$this->rules['A_image'] = 'required|image';
		}

		$messages = array('required' => 'Este campo es obligatorio',
							'image' => 'La imagen tiene que ser formato jpeg, jpg o png');
		$validation = Validator::make($this->attributes, $this->rules, $messages);

		if ($validation->passes()) return true;

		$this->errors = $validation->messages();
		return false;
	}

}