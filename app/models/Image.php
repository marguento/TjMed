<?php

class Image extends Eloquent {

	public $timestamps = false;

	//protected $fillable = ['U_username', 'U_password'];

	protected $primaryKey = 'I_image';
	protected $table = 'images';

}