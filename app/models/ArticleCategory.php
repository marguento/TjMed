<?php

class ArticleCategory extends Eloquent {

	public $timestamps = false;

	//protected $fillable = ['U_username', 'U_password'];

	protected $primaryKey = 'AC_ID';
	protected $table = 'article_categories';

}