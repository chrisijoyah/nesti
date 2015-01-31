@extends('layouts.dashboard')
	@section('dashboard-content')
		<div class="right-col">
			<h1>Bookmarks</h1>

              @if (Auth::user()->bookmarks->isEmpty())
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-info" role="alert">
							<p>You currently have no bookmarks.</p>
						</div>
					</div>
				</div>
              @endif


		      <div class="row">
		        @foreach(Auth::user()->bookmarks as $bookmark)
		        <div class="col-md-6">
		          <div class="listing-container">
		            <i class="fa {{ $bookmark->listing->isBookmarked($bookmark->listing->id) }} save-listing" data-listing-id="{{ $bookmark->listing->id }}"></i>
		            <a href="{{ route('listing.show', $bookmark->listing->id) }}"><div class="photo-container" style="background-image: url({{ $bookmark->listing->photos()->first()->url }});"></div></a>
		            @if ($bookmark->listing->user->avatar)
		                    <a href="{{ route('user.show',$bookmark->listing->user->id ) }}"><img src="{{ asset($bookmark->listing->user->avatar) }}" class="avatar" alt=""></a>
		                  @elseif (!$bookmark->listing->user->avatar)
		                    <img src="{{ asset('assets/avatar@2x.png') }}" class="avatar" alt="">
		                  @endif  
		                  <div class="description">
		                    <p class="title">{{ str_limit($bookmark->listing->title, 44, '...') }}</p>
		                      <p><span class="rent">&pound;{{ $bookmark->listing->rent }}<br /><span class="per-month">Per month</span></span></p>
		                      <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>{{ $bookmark->listing->borough->name }}<span class="glyphicon glyphicon-time" aria-hidden="true"></span><abbr class="timeago" title="{{ $bookmark->listing->created_at }}"></abbr></p>
		                  </div><!--/description-->
		          </div><!--/listing-container-->       
		        </div>
		        @endforeach        
		      </div>

		</div>
	@stop
	@section('scripts')
	<script>
	$(function(){

    // Save listing
    $(".save-listing").click(function(){

      var listing_id = $(this).attr('data-listing-id');

      if($(this).hasClass('fa-heart-o')){
        $(this).removeClass('fa-heart-o');
        $(this).addClass('fa-heart');

        // Add listing to favourites
        $.post("{{ route('bookmark.store') }}", { listing_id: listing_id  } );

        location.reload();



      }
      else{
          $(this).removeClass('fa-heart');
          $(this).addClass('fa-heart-o');

           // Remove listing from favourites
           $.post("{{ route('bookmark.destroy') }}", { listing_id: listing_id, _method: 'DELETE'  } );

           location.reload();
      }
    });




	});
	</script>
	@stop	
@stop