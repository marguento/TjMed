<?php

class Business extends Eloquent {

	public $timestamps = false;

	//protected $fillable = ['U_username', 'U_password'];

	protected $primaryKey = 'B_ID';
	protected $table = 'businesses';

}
