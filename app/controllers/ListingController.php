<?php

class ListingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$listings = Listing::where('user_id', Auth::user()->id)->get();

		return View::make('dashboard.listing.index', array(
			'listings' => $listings
		));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$boroughs = Borough::all();
		$property_types = PropertyType::all();
		$amenities = Amenity::all();
		$preferences = Preference::all();

		return View::make('dashboard.listing.create', array(
			'boroughs' => $boroughs,
			'property_types' => $property_types,
			'amenities' => $amenities,
			'preferences' => $preferences
		));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Listing validation rules
		$rules = array(
			'title' => 'required',
			'description' => 'required',
			'rent' => 'required',
			'available_from' => 'required',
			'minimum_term' => 'required',
			'maximum_term' => 'required',
			'deposit' => 'required',
			'bills_included' => 'required',
			'borough' => 'required',
			'location' => 'required',
			'property_type' => 'required',
			'amenities' => 'required',
			'preferences' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);


		if ($validator->fails()) {
			return Redirect::route('listing.create')->withErrors($validator)->withInput();
		}else{

					$listing = new Listing;
					$listing->title = Input::get('title');
					$listing->rent = Input::get('rent');
					$listing->description = Input::get('description');
					$listing->available_from = Input::get('available_from');
					$listing->minimum_term = Input::get('minimum_term');
					$listing->maximum_term = Input::get('maximum_term');
					$listing->deposit = Input::get('deposit');
					$listing->bills_included = Input::get('bills_included');
					$listing->location = Input::get('location');
					$listing->user_id = Auth::user()->id;

					$borough = Borough::find(Input::get('borough'));
					if($borough){
						$listing->borough_id = $borough->id;
					}

					$property_type = PropertyType::find(Input::get('property_type'));
					if($property_type){
						$listing->property_type_id = $property_type->id;
					}

					$listing->save();

					// Save amenities
					foreach (Input::get('amenities') as $amenity_id){
						$amenity = Amenity::find($amenity_id);

						$listing->amenities()->attach($amenity);
					}

					// Save preferences
					foreach (Input::get('preferences') as $preference_id){
						$preference = Preference::find($preference_id);

						$listing->preferences()->attach($preference);
					}

					// Save photos
					$destination_path = 'uploads/';

					foreach(Input::file('photos') as $photo)
					{
						if($photo){
							if($photo->isValid()){
								$photo_name = str_random(16).'.jpg';
								$photo_url = $destination_path.$photo_name;

								$photo->move($destination_path, $photo_name);

								// Create new photo
								$photo = new Photo(array(
									'url' => $photo_url,
									'name' => $photo_name
								));

								$listing->photos()->save($photo);

							}
						}
					}

					return Redirect::route('listing.index')->with('success', 'Listing Created.');

		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$listing = Listing::find($id);

		return View::make('listing.show', array(
			'listing' => $listing
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
		$listing = Listing::find($id);

		$boroughs = Borough::all();
		$property_types = PropertyType::all();
		$amenities = Amenity::all();
		$preferences = Preference::all();
		$listing_amenities = array_flatten($listing->amenities->toArray());
		$listing_preferences = array_flatten($listing->preferences->toArray());
		$photo_count = $listing->photos->count();
		$new_photo_count = 6 - $photo_count;

		return View::make('dashboard.listing.edit', array(
			'listing' => $listing,
			'boroughs' => $boroughs,
			'property_types' => $property_types,
			'amenities' => $amenities,
			'listing_amenities' => $listing_amenities,
			'preferences' => $preferences,
			'listing_preferences' => $listing_preferences,
			'photo_count' => $photo_count,
			'new_photo_count' => $new_photo_count
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
		// Listing validation rules
		$rules = array(
			'title' => 'required',
			'description' => 'required',
			'rent' => 'required',
			'available_from' => 'required',
			'minimum_term' => 'required',
			'maximum_term' => 'required',
			'deposit' => 'required',
			'bills_included' => 'required',
			'borough' => 'required',
			'location' => 'required',
			'property_type' => 'required',
			'amenities' => 'required',
			'preferences' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);


		if ($validator->fails()) {
			return Redirect::route('listing.edit', $id)->withErrors($validator);
		}else{
				$listing = Listing::find($id);

				if($listing){

					$listing->title = Input::get('title');
					$listing->rent = Input::get('rent');
					$listing->description = Input::get('description');
					$listing->available_from = Input::get('available_from');
					$listing->minimum_term = Input::get('minimum_term');
					$listing->maximum_term = Input::get('maximum_term');
					$listing->deposit = Input::get('deposit');
					$listing->bills_included = Input::get('bills_included');
					$listing->location = Input::get('location');

					$borough = Borough::find(Input::get('borough'));
					if($borough){
						$listing->borough_id = $borough->id;
					}

					$property_type = PropertyType::find(Input::get('property_type'));
					if($property_type){
						$listing->property_type_id = $property_type->id;
					}

					// Clear existing amenities
					$listing->amenities()->detach();

					// Save amenities
					foreach (Input::get('amenities') as $amenity_id){
						$amenity = Amenity::find($amenity_id);

						$listing->amenities()->attach($amenity);
					}

					// Clear existing preferences
					$listing->preferences()->detach();

					// Save preferences
					foreach (Input::get('preferences') as $preference_id){
						$preference = Preference::find($preference_id);

						$listing->preferences()->attach($preference);
					}

					$listing->save();


					// Save new photos
					$destination_path = 'uploads/';

					if(Input::file('photos')){
						foreach(Input::file('photos') as $photo)
						{
							if($photo){
								if($photo->isValid()){
									$photo_name = str_random(16).'.jpg';
									$photo_url = $destination_path.$photo_name;

									$photo->move($destination_path, $photo_name);

									// Create new photo
									$photo = new Photo(array(
										'url' => $photo_url,
										'name' => $photo_name
									));

									$listing->photos()->save($photo);

								}
							}
						}

					}

					
					// Update existing photos
					$listing_photos = $listing->photos->toArray();
					$destination_path = 'uploads/';
					$count=0;
					
					foreach(Input::file('existing_photos') as $photo_file)
					{
						if($photo_file) {
							
							// Generate unique name for photo file
							$photo_name = str_random(16).'.jpg';
							$photo_url = $destination_path.$photo_name;

							// Move photo
							$photo_file->move($destination_path, $photo_name);

							// Existing photo
							$existing_photo = $destination_path.$listing_photos[$count]['name'];

							// Remove existing photo
							if(File::exists($existing_photo)){
								File::delete($existing_photo);
							}

							// Update existing photo to new photo
							$photo_id = $listing_photos[$count]['id'];
							$photo = Photo::find($photo_id);
							$photo->url = $photo_url;
							$photo->name = $photo_name;
							$photo->save();

						}
						$count++;
					}			
					
					return Redirect::route('listing.edit', $id)->with('success', 'Listing saved.');

				}
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
		$listing = Listing::find($id);

		if($listing){
			$listing->delete();
			return Redirect::route('listing.index');
		}
	}

	/**
	 * [destroyPhoto description]
	 * @return [type] [description]
	 */
	public function destroyPhoto()
	{
		$listing = Listing::find(Input::get('listing_id'));
		$photo = Photo::find(Input::get('photo_id'));

		if($listing && $photo){
			$listing->photos()->detach($photo);
			File::delete($photo->url);
			$photo->delete();
		}
	}

}
































