<?php

class Article extends Eloquent {

	public $timestamps = false;

	//protected $fillable = ['U_username', 'U_password'];

	protected $primaryKey = 'A_ID';
	protected $table = 'articles';

}