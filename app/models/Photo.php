<?php

class Photo extends Eloquent {

	protected $guarded = array('id');

	public function listings()
	{
		return $this->belongsToMany('Listing');
	}
}