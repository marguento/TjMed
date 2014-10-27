<?php

class ArticleHasComments extends Eloquent {

	public $timestamps = false;

	//protected $fillable = ['U_username', 'U_password'];
	protected $primaryKey = 'AHC_ID';
	protected $table = 'article_has_comments';

}