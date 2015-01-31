<?php

class Borough extends Eloquent {
	
	public function listings()
	{
		return $this->hasMany('Listing');
	}

	public function users()
	{
		return $this->belongsToMany('User');
	}
}