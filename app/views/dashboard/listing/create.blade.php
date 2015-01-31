@extends('layouts.dashboard')
	@section('dashboard-content')
		<div class="right-col dashboard-listing-edit">


			<div class="actions">
				<button type="submit" class="btn btn-primary btn-submit" onclick="$('#create-listing-form').submit();">Save</button>
			</div>


			<h1>Create Listing</h1>
			<div class="content">
				
				{{ Form::open(array('route' => array('listing.store'), 'method' => 'post', 'files' => true, 'id' => 'create-listing-form')) }}


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
				
				@if(Session::get('success'))
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
						</div>
					</div>
				@endif					
				
				<div class="row">
					<div class="col-md-9">
						<div class="form-group">
							<label for="Title" class="nesti-label">Title</label>
							<input type="text" class="form-control" name="title" value="{{ Input::old('title') }}">
						</div>
					</div>
					<div class="col-md-3">
					<label for="Description" class="nesti-label">Rent (Per Month)</label>
						<div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">&pound;</span>
						  <input name="rent" type="text" class="form-control" placeholder="Rent" aria-describedby="basic-addon1" value="{{ Input::old('rent') }}">
						</div>
					</div>
				</div>
				<div class="row">

					<div class="col-md-12">
						<div class="form-group edit-photos">
							<label for="Description" class="nesti-label">Description</label>
							<textarea class="form-control" rows="3" name="description">{{ Input::old('description') }}</textarea>
						</div>
						<div class="form-group">
							<label for="Photos" class="nesti-label">Photos</label>
							<div class="row">
								@for( $i=1; $i <= 6; $i++ )
									<div class="col-md-4">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											  <div class="fileinput-new thumbnail">
											    <img src="{{ asset('assets/photo-placeholder.png') }}" class="edit-thumbnail" alt="">
											  </div>
											  <div class="fileinput-preview fileinput-exists thumbnail">
											  </div>
											  <div>
											    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="photos[]"></span>
											    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
											  </div>
										</div>	
									</div>
								@endfor
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="Title" class="nesti-label">Available From</label>
							<input name="available_from" type="text" class="datepicker form-control" data-date-format="yyyy-mm-dd" value="{{ Input::old('available_from') }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="Title" class="nesti-label">Minimum Term (Months)</label>
							<input name="minimum_term" type="text" class="form-control" value="{{ Input::old('minimum_term') }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="Title" class="nesti-label">Maximum Term (Months)</label>
							<input name="maximum_term" type="text" class="form-control" value="{{ Input::old('maximum_term') }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
					<label for="Description" class="nesti-label">Deposit</label>
						<div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">&pound;</span>
						  <input name="deposit" type="text" class="form-control" placeholder="Rent" aria-describedby="basic-addon1" value="{{ Input::old('deposit') }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="Title" class="nesti-label">Bills Included</label>
							<select name="bills_included" class="form-control">
							  <option value="1"  {{  Input::old('bills_included') == 1? 'selected' : '' }}>Yes</option>
							  <option value="0"  {{  Input::old('bills_included') == 1? 'selected' : '' }}>No</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="Title" class="nesti-label">Borough</label>
							<select name="borough" class="form-control">
								@foreach($boroughs as $borough)
							  		<option value="{{ $borough->id }}"  {{  Input::old('borough') == $borough->id ? 'selected' : '' }}>{{ $borough->name }}</option>
							  	@endforeach
							</select>
						</div>
					</div>
				</div>				
				<div class="row">
					<div class="col-md-9">
						<div class="form-group">
							<label for="Title" class="nesti-label">Location</label>
							<input name="location" type="text" class="form-control" id="nesti-search" value="{{ Input::old('location') }}">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="Rent" class="nesti-label">Property Type</label>
							<select name="property_type" class="form-control">
								@foreach($property_types as $property_type)
							  		<option value="{{ $property_type->id }}"  {{  Input::old('property_type') == $property_type->id ? 'selected' : '' }}>{{ $property_type->name }}</option>
							  	@endforeach
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
					<label for="Title" class="nesti-label">Amenities</label>
						@foreach($amenities as $amenity)
							<div class="form-group">
							<label class="checkbox-inline">
							  <input type="checkbox" name="amenities[]" value="{{ $amenity->id }}" > {{ $amenity->name }}
							</label>
						</div>
						@endforeach	
					</div>
					<div class="col-md-6">
					<label for="Title" class="nesti-label">Tenant Preferences</label>
						@foreach($preferences as $preference)
							<div class="form-group">
							<label class="checkbox-inline">
							  <input type="checkbox" name="preferences[]" value="{{ $preference->id }}"> {{ $preference->name }}
							</label>
						</div>
						@endforeach	
					</div>
				</div>
			
				
				</form>	
			

			</div>
		</div>
	@stop
	@section('scripts')
		{{ HTML::script('js/holder.js') }}
		{{ HTML::script('js/bootstrap-datepicker.js') }}
		{{ HTML::script('js/bootstrap-tagsinput.min.js') }}
		<script>
		$(function(){
			$('.datepicker').datepicker();
			$('#nesti-search').geocomplete();
		})
		</script>
	@stop

@stop

















