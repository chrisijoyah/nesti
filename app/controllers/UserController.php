<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);

		return View::make('user.show', array(
			'user' => $user,
		));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		$languages = Language::all();
		$user_languages = array_flatten(Auth::user()->languages->toArray());
		$boroughs = Borough::all();
		$user_boroughs = array_flatten(Auth::user()->boroughs->toArray());
		$amenities = Amenity::all();
		$user_amenities = array_flatten(Auth::user()->amenities->toArray());
		$preferences = Preference::all();
		$user_preferences = array_flatten(Auth::user()->preferences->toArray());
		$interests = Interest::all();
		$user_interests = array_flatten(Auth::user()->interests->toArray());



		return View::make('dashboard.user.edit', array(
			'user' => $user,
			'languages' => $languages,
			'boroughs' => $boroughs,
			'amenities' => $amenities,
			'preferences' => $preferences,
			'user_boroughs' => $user_boroughs,
			'user_languages' => $user_languages,
			'user_amenities' => $user_amenities,
			'user_preferences' => $user_preferences,
			'interests' => $interests,
			'user_interests' => $user_interests
		));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = Auth::user();


		//dd(Input::all());

		$rules_tenants = array(
			'email' => 'required|email|unique:users,email,'.$user->id,
			'name' => 'required',
			'description' => 'required',
			'occupation' => 'required',
			'budget' => 'required',
			'gender' => 'required',
			'available_from' => 'required',
			'minimum_term' => 'required',
			'maximum_term' => 'required',
			'age' => 'required',
			'property_type' => 'required'
		);

		$rules_others = array(
			'email' => 'required|email|unique:users,email,'.$user->id,
			'name' => 'required',
			'description' => 'required'
		);

		if($user->role_id == Role::TENANT){
			$validator = Validator::make(Input::all(), $rules_tenants);
		}else{
			$validator = Validator::make(Input::all(), $rules_others);
		}

		if ($validator->fails()) {
			return Redirect::route('user.edit', $user->id)->withErrors($validator);
		}else{

				if(Input::file('avatar')){
					// Delete existing photo
					if(File::exists($user->avatar)){
						File::delete($user->avatar);
					}
					// Save photo
					$avatar = Input::file('avatar');
					$avatar_name = str_random(16).'.jpg';
					$destination_path = 'uploads/avatars/';
					$avatar_url = $destination_path.$avatar_name;

					// Move photo
					$avatar->move($destination_path, $avatar_name);

					$user->avatar = $avatar_url;						
				}

				$user->email = Input::get('email');
				$user->name = Input::get('name');
				$user->description = Input::get('description');

				if($user->role_id == Role::TENANT){
					$user->occupation = Input::get('occupation');
					$user->budget = Input::get('budget');
					$user->gender = Input::get('gender');	
					$user->property_type = Input::get('property_type');	
					$user->available_from = Input::get('available_from');
					$user->minimum_term = Input::get('minimum_term');
					$user->maximum_term = Input::get('maximum_term');
					$user->age = Input::get('age');	


					// Clear existing boroughs
					$user->boroughs()->detach();	

					// Save boroughs
					foreach (Input::get('boroughs') as $borough_id){
						$borough = Borough::find($borough_id);

						$user->boroughs()->attach($borough);
					}

					// Clear existing preferences
					$user->preferences()->detach();	

					// Save preferences
					foreach (Input::get('preferences') as $preference_id){
						$preference = Preference::find($preference_id);

						$user->preferences()->attach($preference);
					}

					// Clear existing languages
					$user->languages()->detach();	

					// Save languages
					foreach (Input::get('languages') as $language_id){
						$language = Borough::find($language_id);

						$user->languages()->attach($language);
					}

					// Clear existing amenities
					$user->amenities()->detach();	

					// Save amenities
					foreach (Input::get('amenities') as $amenity_id){
						$amenity = Amenity::find($amenity_id);

						$user->amenities()->attach($amenity);
					}					

					// Clear existing interests
					$user->interests()->detach();	

					// Save interests
					foreach (Input::get('interests') as $interest_id){
						$interest = Interest::find($interest_id);

						$user->interests()->attach($interest);
					}

				}

				$user->save();

			return Redirect::route('user.edit', $user->id)->with('success', 'Profile updated.');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
