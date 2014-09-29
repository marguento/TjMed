<?php

class Comment extends Eloquent {

	public $timestamps = false;

	//protected $fillable = ['U_username', 'U_password'];

	protected $primaryKey = 'C_ID';
	protected $table = 'comments';

}