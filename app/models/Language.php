<?php

class Language extends Eloquent {

	public function users()
	{
		return $this->belongsToMany('User');
	}
}