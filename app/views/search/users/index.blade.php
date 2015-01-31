@extends('layouts.master')
	@section('content')
		<div class="container">
			<div class="row">
				@foreach($users as $user)
				<div class="col-md-3">
					<div class="flatmate-container">
						<i class="fa fa-circle"></i>
						<i class="btn-favourite fa fa-heart-o"></i>
						<a href="{{ route('user.show', $user->id )}}"><img src="{{ asset( $user->avatar ) }}" alt="" class="avatar img-responsive"></a>
						<p class="budget">&pound;{{ $user->budget }}<br /><span>Per Month</span></p>
						<p><span class="first-name">{{ $user->name }}</span><br />{{ $user->occupation }}</p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	@stop
	@section('scripts')
	<script>
	$(function(){

		// Favourites
		$(".btn-favourite").click(function(){

			// Favourites
			$(".btn-favourite").click(function(){
				$(this).removeClass('fa-heart-o');
				$(this).addClass('fa-heart');
			});

		});
	});
	</script>
	@stop
@stop