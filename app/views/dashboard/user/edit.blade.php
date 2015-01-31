@extends('layouts.dashboard')
	@section('dashboard-content')
		<div class="right-col dashboard-profile">

				<div class="actions">
					<button type="submit" class="btn btn-default" onclick="$('#edit-profile-form').submit();">Save</button>
					<a href="{{ route('user.show', Auth::user()->id ) }}" type="submit" class="btn btn-default">View Profile</a>	
				</div>


			<h1>Edit Profile</h1>

						<div class="content">
							{{ Form::open(array('route' => array('user.update', Auth::user()->id), 'method' => 'put', 'files' => true, 'id' => 'edit-profile-form')) }}
								
							@if(Session::get('success'))
								<div class="row">
									<div class="col-md-12">
										<div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
									</div>
								</div>
							@endif					

							@if ($errors->has())
								<div class="row">
									<div class="col-md-12">
										<div class="alert alert-danger" role="alert">
										@foreach($errors->all() as $error)
											<p>{{ $error }}</p>
										@endforeach
												 
										</div>
									</div>
								</div>
				            @endif
					

							<div class="row">
								<div class="col-md-5">

		 							<label for="avatar" class="nesti-label">Avatar</label>
									<div class="form-group">
									   

										<div class="fileinput fileinput-new" data-provides="fileinput">
										  <div class="fileinput-new thumbnail" style="width: 200px; height: auto;">
										    @if(Auth::user()->avatar)
										    	<img src="{{ asset(Auth::user()->avatar) }}" style="width: 200px;height: auto" alt="">
										    @else
												<img src="{{ asset('assets/avatar@2x.png') }}" style="width: 200px;height: auto" alt="">
										    @endif
										  
										  </div>
										  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
										  <div>
										    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="avatar"></span>
										    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
										  </div>
										</div>
									   
									  </div>


									  <div class="form-group">
									    <label for="exampleInputEmail1" class="nesti-label">Email Address</label>
									    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
									  </div>
									  <div class="form-group">
									    <label for="exampleInputPassword1" class="nesti-label">Name</label>
									    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
									  </div>
									  

									  @if(Auth::user()->role_id == Role::TENANT)


									  <div class="form-group">
									    <label for="exampleInputPassword1" class="nesti-label">Age</label>
									    <input type="text" class="form-control" name="age" value="{{ Auth::user()->age }}">
									  </div>

									  <div class="form-group">
									    <label for="exampleInputPassword1" class="nesti-label">Occupation</label>
									    <input type="text" class="form-control" name="occupation" value="{{ Auth::user()->occupation }}">
									  </div>
									  
										<label for="Description" class="nesti-label">Budget (Per Month)</label>
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">&pound;</span>
										  <input name="budget" type="text" class="form-control" placeholder="Rent" aria-describedby="basic-addon1" value="{{ Auth::user()->budget }}">
										</div>
										<br />
									<div class="form-group">
									<label for="exampleInputPassword1" class="nesti-label">Gender</label><br />
										<label class="radio-inline">
										  <input type="radio" name="gender" value="male" {{ Auth::user()->gender == 'male'? 'checked' : '' }}> Male
										</label>
										<label class="radio-inline">
										  <input type="radio" name="gender" value="female" {{ Auth::user()->gender == 'female'? 'checked' : '' }}> Female
										</label>
									</div>

									 
									  <div class="form-group">
									    <label for="exampleInputPassword1" class="nesti-label">Availability</label>
									    <input type="text" class="form-control datepicker" name="available_from" value="{{ Auth::user()->available_from }}" data-date-format="yyyy-mm-dd">
									  </div>


									  <div class="form-group">
									    <label for="exampleInputPassword1" class="nesti-label">Minimum Term (months)</label>
									    <input type="text" class="form-control" name="minimum_term" value="{{ Auth::user()->minimum_term }}">
									  </div>

									  <div class="form-group">
									    <label for="exampleInputPassword1" class="nesti-label">Maximum Term (months)</label>
									    <input type="text" class="form-control" name="maximum_term" value="{{ Auth::user()->maximum_term }}">
									  </div>

									<div class="form-group">
									<label for="exampleInputPassword1" class="nesti-label">Desired Property Type</label><br />
										<label class="radio-inline">
										  <input type="radio" name="property_type" value="flat" {{ Auth::user()->property_type == 'flat'? 'checked' : '' }}> Flat
										</label>
										<label class="radio-inline">
										  <input type="radio" name="property_type" value="house" {{ Auth::user()->property_type == 'house'? 'checked' : '' }}> House
										</label>

										<label class="radio-inline">
										  <input type="radio" name="property_type" value="any" {{ Auth::user()->property_type == 'any'? 'checked' : '' }}> Any
										</label>

									</div>


									<label for="exampleInputPassword1" class="nesti-label">Interests</label>
									  @foreach($interests as $interest)
									  <div class="form-group">
									    <div class="checkbox">
										  <label>
										    <input type="checkbox" name="interests[]" value=" {{ $interest->id }}" {{ in_array($interest->name, $user_interests) ? 'checked' : '' }}>
										    {{ $interest->name }}
										  </label>
										</div>
									  </div>
									  @endforeach



									  @endif
									

									


									<br />

									
								</div>
								<div class="col-md-7">										
									  <div class="form-group">
									    <label for="exampleInputEmail1" class="nesti-label">Description</label>
									    <textarea id="description" class="form-control description-edit" name="description">{{ Auth::user()->description }}</textarea>
									  </div>
										
										  @if(Auth::user()->role_id == Role::TENANT)
										<label for="exampleInputPassword1" class="nesti-label">Desired Locations</label>
										<div class="row">
											<div class="col-md-6">
											  @foreach($boroughs->slice(0, 16) as $borough)
											  <div class="form-group">
											    <div class="checkbox">
												  <label>
												    <input type="checkbox" name="boroughs[]" value=" {{ $borough->id }}"   {{ in_array($borough->name, $user_boroughs) ? 'checked' : '' }}>
												    {{ $borough->name }}
												  </label>
												</div>
											  </div>
											  @endforeach
											</div>
											<div class="col-md-6">
											  @foreach($boroughs->slice(17) as $borough)
											  <div class="form-group">
											    <div class="checkbox">
												  <label>
												    <input type="checkbox" name="boroughs[]" value="{{ $borough->id }}" {{ in_array($borough->name, $user_boroughs) ? 'checked' : '' }}>
												    {{ $borough->name }}
												  </label>
												</div>
											  </div>
											  @endforeach												
											</div>
										</div>


										<br />



										<label for="exampleInputPassword1" class="nesti-label">Languages</label>

										<div class="row">
											<div class="col-md-6">
											  @foreach($languages->slice(0, 16) as $language)
											  <div class="form-group">
											    <div class="checkbox">
												  <label>
												    <input type="checkbox" name="languages[]" value=" {{ $language->id }}" {{ in_array($language->name, $user_languages) ? 'checked' : '' }}>
												    {{ $language->name }}
												  </label>
												</div>
											  </div>
											  @endforeach
											</div>
											<div class="col-md-6">
											  @foreach($languages->slice(17) as $language)
											  <div class="form-group">
											    <div class="checkbox">
												  <label>
												    <input type="checkbox" name="languages[]" value="{{ $language->id }}" {{ in_array($language->name, $user_languages) ? 'checked' : '' }}>
												    {{ $language->name }}
												  </label>
												</div>
											  </div>
											  @endforeach												
											</div>
										</div>

										<br />

										

										<div class="row">
											<div class="col-md-6">
											<label for="exampleInputPassword1" class="nesti-label">Desired Amenities</label>
											  @foreach($amenities as $amenity)
											  <div class="form-group">
											    <div class="checkbox">
												  <label>
												    <input type="checkbox" name="amenities[]" value=" {{ $amenity->id }}" {{ in_array($amenity->name, $user_amenities) ? 'checked' : '' }}>
												    {{ $amenity->name }}
												  </label>
												</div>
											  </div>
											  @endforeach
											</div>
											<div class="col-md-6">
											<label for="exampleInputPassword1" class="nesti-label">Household Preferences</label>
											  @foreach($preferences as $preference)
											  <div class="form-group">
											    <div class="checkbox">
												  <label>
												    <input type="checkbox" name="preferences[]" value="{{ $preference->id }}" {{ in_array($preference->name, $user_preferences) ? 'checked' : '' }}>
												    {{ $preference->name }}
												  </label>
												</div>
											  </div>
											  @endforeach												
											</div>
										</div>
										@endif


								</div>
							</div>
							</form>
						</div>
		</div>
	@stop
	@section('scripts')
	{{ HTML::script('js/wysihtml5-0.3.0.js') }}
	{{ HTML::script('js/bootstrap-wysihtml5.js') }}
	{{ HTML::script('js/bootstrap-tagsinput.min.js') }}
	{{ HTML::script('js/typeahead.js') }}
	{{ HTML::script('js/bootstrap-datepicker.js') }}
	<script>
	$(function(){
		$('#description').wysihtml5({
			"font-styles": false,
			"emphasis": false, 
			"lists": false, 
			"html": false, 
			"link": false, 
			"image": false, 
			"color": false 
		});

		$('.datepicker').datepicker();

	});
	</script>
	@stop
@stop












