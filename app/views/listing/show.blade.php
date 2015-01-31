@extends('layouts.master')
	@section('content')
		<div class="container listing-detail">
			<div class="row">
			
				<div class="col-md-3">
					<div class="first-column">
						<div class="content-box">
							<h2>Tenant Preferences</h2>
							@foreach($listing->preferences as $preference)
								<span>{{ $preference->name }}</span>
							@endforeach
						</div>
						<div class="content-box">
							<h2>Amenities</h2>
							@foreach($listing->amenities as $amenity)
								<span>{{ $amenity->name }}</span>
							@endforeach

						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="left-col">
						<div class="description">
						
						<div id="owl-demo">
							@foreach($listing->photos as $photo)
								<div class="item"><img src="{{ asset($photo->url) }}" alt="Owl Image"></div>
							@endforeach
						</div>
							
							<h1>{{ $listing->title }}</h1>

							<p>{{ $listing->description }}</p>
				
								<div class="row">
									<div class="col-md-6">
										<div class="middle-box">
											<h2>Property Type</h2>
											<span>{{ $listing->property_type->name }}</span>
										</div>
										<div class="middle-box">
											<h2>Rent Per Month</h2>
											<span>&pound;{{ $listing->rent }}</span>
										</div>
										<div class="middle-box">
											<h2>Deposit</h2>
											<span>&pound;{{ $listing->deposit }}</span>
										</div>
										<div class="middle-box">
											<h2>Bills Included</h2>
											<span>{{ $listing->bills_included == 1? 'Yes' : 'No' }}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="middle-box">
											<h2>Available From</h2>
											<span>{{ $listing->available_from }}</span>
										</div>
										<div class="middle-box">
											<h2>Minimum Term</h2>
											<span>{{ $listing->minimum_term }} Months</span>
										</div>
										<div class="middle-box">
											<h2>Maximum Term</h2>
											<span>{{ $listing->maximum_term }} Months</span>
										</div>
									</div>
								</div>



						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="right-col">
						<div class="contact-container">
							<a href="{{ route('user.show', $listing->user->id ) }}"><img src="{{ asset($listing->user->avatar) }}" class="avatar img-responsive" alt="">	</a>
							<p class="name">{{ $listing->user->first_name }} {{ $listing->user->last_name }}</p>
							<p class="role">Landlord</p>
						</div>	
					</div>
				</div>
			</div>
		</div>
		@section('scripts')
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
			<script>
			  function initialize() {
			    var myLatlng = new google.maps.LatLng(51.551706,-0.158826);
			    var mapOptions = {
			      zoom: 13,
			      center: myLatlng
			    }
			    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

			    var image = {
			      url: "{{ asset('assets/mappin@2x.png') }}",
			      scaledSize: new google.maps.Size(54, 75)
			    };

			    var marker = new google.maps.Marker({
			        position: myLatlng,
			        map: map,
			        //icon: image
			    });
			  }

			  google.maps.event.addDomListener(window, 'load', initialize);
			</script>
			{{ HTML::script('js/owl.carousel.min.js') }}
			<script>


    $(document).ready(function() {
     
    $("#owl-demo").owlCarousel({
     
    autoPlay: 3000, //Set AutoPlay to 3 seconds
     
    items : 1,
    autoHeight : true,
    //itemsDesktop : [1199,3],
    //itemsDesktopSmall : [979,3]
     
    });
     
    });


			</script>
		@stop
	@stop
@stop