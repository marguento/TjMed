<?php

class Specialty extends Eloquent {

	public $timestamps = false;

	//protected $fillable = ['U_username', 'U_password'];

	protected $primaryKey = 'S_ID';
	protected $table = 'specialties';

}