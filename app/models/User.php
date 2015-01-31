<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function listings()
	{
		return $this->hasMany('Listing');
	}

	public function bookmarks()
	{
		return $this->hasMany('Bookmark');
	}

	public function messages()
	{
		return $this->belongsToMany('Message');
	}

	public function roles()
	{
		return $this->belongsToMany('Role');
	}

	public function boroughs()
	{
		return $this->belongsToMany('Borough');
	}

	public function interests()
	{
		return $this->belongsToMany('Interest');
	}

	public function amenities()
	{
		return $this->belongsToMany('Amenity');
	}

	public function preferences()
	{
		return $this->belongsToMany('Preference');
	}

	public function availabilities()
	{
		return $this->belongsToMany('Availability');
	}

	public function languages()
	{
		return $this->belongsToMany('Language');
	}

	public function userable()
	{
		return $this->morphTo();
	}

}
