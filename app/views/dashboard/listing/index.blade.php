@extends('layouts.dashboard')
	@section('dashboard-content')
		<div class="right-col dashboard-listing">
			<a href="{{ route('listing.create') }}" class="btn btn-primary">Create Listing</a>
			<h1>Listings</h1>
		    @if($listings->isEmpty())
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-info" role="alert">
							<p>You currently have no listings.</p>
						</div>
					</div>
				</div>
              @endif
		      <div class="row">
		        @foreach($listings as $listing)
		        <div class="col-md-6">
		          <div class="listing-container">
		          	<div class="edit-overlay">
		          		<a href="{{ route('listing.edit', $listing->id) }}" class="btn btn-default">Edit</a>
		          	</div>
		            <a href="{{ route('listing.show', $listing->id) }}"><div class="photo-container" style="background-image: url({{ $listing->photos()->first()->url }});"></div></a> 
		          </div><!--/listing-container-->       
		        </div>
		        @endforeach        
		      </div>
		</div>
	@stop
@stop