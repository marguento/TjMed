<?php

class Tag extends Eloquent {

	public $timestamps = false;

	//protected $fillable = ['U_username', 'U_password'];

	protected $primaryKey = 'T_ID';
	protected $table = 'tags';

}