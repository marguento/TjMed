<?php

class BusinessHasTags extends Eloquent {

	public $timestamps = false;
	
	protected $primaryKey = 'BHT_ID';

	protected $table = 'businesses_has_tags';

}