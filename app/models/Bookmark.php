<?php

class Bookmark extends Eloquent {

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function listing()
	{
		return $this->belongsTo('Listing');
	}
}