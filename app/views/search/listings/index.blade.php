@extends('layouts.master')
	@section('content')
		<div class="filter-container" id="filter-container">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-default filter-btn" id="close-filter-btn"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Close</button>
						<h2>Filters</h2>
						<label>Rent Per Month</label>
						
						<div id="slider"></div>

						<div class="rent-range">
							<span class="max">&pound;<span id="max-rent"></span>&plus;</span>
							<span class="min">&pound;<span id="min-rent"></span></span>
						</div>

						<div class="amenity">
							<img src="{{ asset('assets/wifi@2x.png') }}" alt="">
							<div>Wifi<br /><input type="checkbox"></div>
						</div>

						<div class="amenity">
							<img src="{{ asset('assets/chair@2x.png') }}" alt="">
							<div>Furnished<br /><input type="checkbox"></div>
						</div>

						<div class="amenity">
							<img src="{{ asset('assets/washingmachine@2x.png') }}" alt="">
							<div>Washing Machine<br /><input type="checkbox"></div>
						</div>
	
						<div class="amenity">
							<img src="{{ asset('assets/double-bed@2x.png') }}" alt="">
							<div>Double Bed<br /><input type="checkbox"></div>
						</div>

						<div class="amenity">
							<img src="{{ asset('assets/garage@2x.png') }}" alt="">
							<div>Garage<br /><input type="checkbox"></div>
						</div>

						<div class="amenity">
							<img src="{{ asset('assets/parking@2x.png') }}" alt="">
							<div>Parking<br /><input type="checkbox"></div>
						</div>

						<div class="amenity">
							<img src="{{ asset('assets/disabled@2x.png') }}" alt="">
							<div>Disabled Access<br /><input type="checkbox"></div>
						</div>						

						<div class="amenity">
							<img src="{{ asset('assets/shower@2x.png') }}" alt="">
							<div>En Suite<br /><input type="checkbox"></div>
						</div>	
						
						<div class="amenity">
							<img src="{{ asset('assets/garden@2x.png') }}" alt="">
							<div>Garden<br /><input type="checkbox"></div>
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-default apply-filter-btn">Apply Filter</button>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<button class="btn btn-default filter-btn" id="filter-btn"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span>Filters</button>
				</div>
			</div>
			<div class="row">
				@foreach($listings as $listing)
				<div class="col-md-4">
					<div class="listing-container">
			            @if(Auth::check())
			            <i class="fa {{ $listing->isBookmarked($listing->id) }} save-listing" data-listing-id="{{ $listing->id }}"></i>
			            @else
			              <a href="{{ route('signup.index') }}"><i class="fa fa-heart-o"></i></a>
			            @endif     
						<a href="{{ route('listing.show', $listing->id) }}"><div class="photo-container" style="background-image: url({{ $listing->photos()->first()->url }});"></div></a>
						@if ($listing->user->avatar)
			            	<a href="{{ route('user.show',$listing->user->id ) }}"><img src="{{ asset($listing->user->avatar) }}" class="avatar" alt=""></a>
			            @elseif (!$listing->user->avatar)
			            	<img src="{{ asset('assets/avatar@2x.png') }}" class="avatar" alt="">
			            @endif  
			            <div class="description">
			            	<p class="title">{{ str_limit($listing->title, 44, '...') }}</p>
			               	<p><span class="rent">&pound;{{ $listing->rent }}<br /><span class="per-month">Per month</span></span></p>
                      <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>{{ $listing->borough->name }}<span class="glyphicon glyphicon-time" aria-hidden="true"></span><abbr class="timeago" title="{{ $listing->created_at }}"></abbr></p>
			            </div><!--/description-->
					</div><!--/listing-container-->				
				</div>
				@endforeach
			</div>
		</div>
	@stop
	@section('scripts')
	{{ HTML::script('js/jquery.nouislider.all.min.js') }}
	<script>
	$(function(){

		// Rent slider
		$("#slider").noUiSlider({
			start: [300, 1200],
			step: 10,
			connect: true,
			range: {
				'min': 0,
				'max': 1500
			}
		});

		$("#slider").Link('lower').to($('#min-rent'));
		$("#slider").Link('upper').to($('#max-rent'));


		$("#filter-btn").click(function(){
			$("#filter-container").show();
			$("#filter-btn").hide();
		})
		$("#close-filter-btn").click(function(){
			$("#filter-container").hide();
			$("#filter-btn").show();
		})

		// Favourites
		$(".btn-favourite").click(function(){
			$(this).removeClass('fa-heart-o');
			$(this).addClass('fa-heart');
		});

    //Jquery timeago
    $("abbr.timeago").timeago();


    // Save listing
    $(".save-listing").click(function(){

      var listing_id = $(this).attr('data-listing-id');

      if($(this).hasClass('fa-heart-o')){
        $(this).removeClass('fa-heart-o');
        $(this).addClass('fa-heart');

        // Add listing to favourites
        $.post("{{ route('bookmark.store') }}", { listing_id: listing_id  } );



      }
      else{
          $(this).removeClass('fa-heart');
          $(this).addClass('fa-heart-o');

           // Remove listing from favourites
           $.post("{{ route('bookmark.destroy') }}", { listing_id: listing_id, _method: 'DELETE'  } );
      }
    });




	});
	</script>
	@stop
@stop
