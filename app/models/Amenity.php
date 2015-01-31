<?php

class Amenity extends Eloquent{

	public function users()
	{
		return $this->belongsToMany('User');
	}
}