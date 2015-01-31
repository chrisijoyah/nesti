<?php

class SearchController extends BaseController {

	public function index()
	{
		$listings = Listing::all();
		$boroughs = Borough::orderBy('name')->get();
		
		return View::make('search.listings.index', array(
			'listings' => $listings,
			'boroughs' => $boroughs
		));
	}

	public function indexUsers()
	{
		$listings = Listing::all();
		$boroughs = Borough::orderBy('name')->get();

		$users = User::where('role_id', 1)->get();
		
		return View::make('search.users.index', array(
			'users' => $users,
			'boroughs' => $boroughs
		));
	}
}