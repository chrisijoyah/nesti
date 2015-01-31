<?php
class Listing extends Eloquent {

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function photos()
	{
		return $this->belongsToMany('Photo');
	}

	public function borough()
	{
		return $this->belongsTo('Borough');
	}

	public function amenities()
	{
		return $this->belongsToMany('Amenity');
	}

	public function preferences()
	{
		return $this->belongsToMany('Preference');
	}

	public function propertyType()
	{
		return $this->belongsTo('PropertyType');
	}

	public function Comment()
	{
		return $this->belongsToMany('Comment');
	}

	public function getSlug()
	{
		$slug = '/flatshare/'.Str::slug($this->borough->name).'/'.$this->id;
		
		return $slug;
	}

	public function isBookmarked($listing_id)
	{
		$bookmarks = DB::table('bookmarks')
			->where('user_id', Auth::user()->id)
			->where('listing_id', $listing_id)
			->count();

		if($bookmarks > 0){
			echo 'fa-heart';
		}else{
			echo 'fa-heart-o';
		}

	}
}




















