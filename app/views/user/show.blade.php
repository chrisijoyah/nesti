@extends('layouts.master')
	@section('content')
		<div class="container profile">
			<div class="row">
				<div class="col-md-3">
					<div class="left-col">
						<i class="fa fa-circle"></i>
						<i class="btn-favourite fa fa-heart-o"></i>
						<img src="{{ asset($user->avatar) }}" class="img-responsive avatar" alt="">
						<p class="name">{{ $user->name }}</p>
						<p class="role">{{ $user->roles()->first()->name }}</p>
					</div>
				</div>
				<div class="col-md-9">
					@if($user->role_id == Role::TENANT)
					<div class="right-col">
						<div class="description">
							<h1>About {{ $user->name }}</h1>
							{{ $user->description }}
						</div>
						<div class="row">
							<div class="col-md-6 availability">
								<div class="content-box">
									<h1>Languages</h1>
									@foreach($user->languages as $language)
										<p class="amenity-tag">{{ $language->name }}</p>
									@endforeach
								</div>
								<div class="content-box">
									<h1>Amenity Prefrences</h1>
									@foreach($user->amenities as $amenity)
										<p class="amenity-tag">{{ $amenity->name }}</p>
									@endforeach
								</div>
								<div class="content-box">
									<h1>Property Type</h1>
									<p class="amenity-tag">{{ $user->property_type }}</p>
								</div>	
								<div class="content-box">
									<h1>Interests</h1>
									@foreach($user->interests as $interest)
										<p class="amenity-tag">{{ $interest->name }}</p>
									@endforeach
								</div>	
								<div class="content-box">
									<h1>Age</h1>
									<p class="household-preference-tag">{{ $user->age }}</p>
								</div>	
								<div class="content-box">
									<h1>Gender</h1>
									<p class="household-preference-tag">{{ $user->gender }}</p>
								</div>	
								<div class="content-box">
									<h1>Minimum Term</h1>
									<p class="household-preference-tag">{{ $user->minimum_term }} Months</p>
								</div>						
							</div>
							<div class="col-md-6 locations">
								<div class="content-box">
									<h1>Location Preferences</h1>
									@foreach($user->boroughs as $borough)
										<p class="amenity-tag">{{ $borough->name }}</p>
									@endforeach
								</div>
								<div class="content-box">
									<h1>Household Preferences</h1>
									@foreach($user->preferences as $preference)
										<p class="amenity-tag">{{ $preference->name }}</p>
									@endforeach
								</div>
								<div class="content-box">
									<h1>Occupation</h1>
									<p class="household-preference-tag">{{ $user->occupation }}</p>
								</div>
								<div class="content-box">
									<h1>Budget</h1>
									<p class="household-preference-tag">&pound;{{ $user->budget }}</p>
								</div>
								<div class="content-box">
									<h1>Availability</h1>
									<p class="household-preference-tag">{{ $user->available_from }}</p>
								</div>	
								<div class="content-box">
									<h1>Maximum Term</h1>
									<p class="household-preference-tag">{{ $user->maximum_term }} Years</p>
								</div>	
							</div>
						</div>
					</div>
					@else
						<div class="right-col">
							<div class="description">
								<h1>About {{ $user->first_name }}sss</h1>
								{{ $user->description }}
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
	@stop
@stop