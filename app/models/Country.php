<?php

class Country extends Eloquent {

	public $timestamps = false;

	protected $primaryKey = 'idCountry';
	protected $table = 'countries';

}