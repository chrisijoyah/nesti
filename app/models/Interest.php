<?php

class Interest extends Eloquent {

	public function users()
	{
		return $this->belongsToMany('User');
	}
}