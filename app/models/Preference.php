<?php

class Preference extends Eloquent{

	public function users()
	{
		return $this->belongsToMany('User');
	}
}