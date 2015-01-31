@extends('layouts.master')
	@section('title')
		nesti
	@stop
	@section('content')
		<div class="container dashboard">
			<div class="row">
				<div class="col-md-3">
					<div class="menu">
						<ul>
							<li><a href="{{ route('dashboard') }}"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>Dashboard</a></li>
							<li><a href="#"><span class="label label-success">14</span><i class="fa fa-envelope-o"></i>Inbox</a></li>
							<li><a href="{{ route('user_listings') }}" class="active"><i class="fa fa-list-ul"></i>My Listings</a></li>
							<li><a href="#"><i class="fa fa-heart-o"></i>Favourites</a></li>
							<li><a href="#"><i class="fa fa-smile-o"></i>Recommendations</a></li>
							<li><a href="#"><i class="fa fa-cogs"></i>Account Settings</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-9">
					<h1>My Listings</h1>
					<div class="row">
						<div class="col-md-6">
							<div class="listing-box">
								<i class="fa fa-heart-o"></i>
								<img src="{{ asset('assets/rooms/1.jpg') }}" alt="" class="img-responsive">
								<div class="description">
									<p><span class="title">Large double bedroom  fully furnished and all inclusive</span></p>
									<p><span class="rent">&pound;650</span><span class="location"><i class="fa fa-map-marker"></i>Camden</span></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="listing-box">
								<i class="fa fa-heart-o"></i>
								<img src="{{ asset('assets/rooms/1.jpg') }}" alt="" class="img-responsive">
								<div class="description">
									<p><span class="title">Large double bedroom  fully furnished and all inclusive</span></p>
									<p><span class="rent">&pound;650</span><span class="location"><i class="fa fa-map-marker"></i>Camden</span></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="listing-box">
								<i class="fa fa-heart-o"></i>
								<img src="{{ asset('assets/rooms/1.jpg') }}" alt="" class="img-responsive">
								<div class="description">
									<p><span class="title">Large double bedroom  fully furnished and all inclusive</span></p>
									<p><span class="rent">&pound;650</span><span class="location"><i class="fa fa-map-marker"></i>Camden</span></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="listing-box">
								<i class="fa fa-heart-o"></i>
								<img src="{{ asset('assets/rooms/1.jpg') }}" alt="" class="img-responsive">
								<div class="description">
									<p><span class="title">Large double bedroom  fully furnished and all inclusive</span></p>
									<p><span class="rent">&pound;650</span><span class="location"><i class="fa fa-map-marker"></i>Camden</span></p>
								</div>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
	@stop
@stop