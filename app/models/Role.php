<?php

class Role extends Eloquent {

	const TENANT = 1;
	const LANDLORD = 2;
	const AGENCY = 3;

	public function users()
	{
		return $this->belongsToMany('User');
	}
}