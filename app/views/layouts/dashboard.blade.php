@extends('layouts.master')
	@section('content')
		<div class="container dashboard">
			<div class="row">
				<div class="col-md-3">
					<div class="left-col">
						<ul>
							<li class="{{ Route::currentRouteName() == 'dashboard' ? 'active':'' }}"><a href="{{ route('dashboard') }}"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>Dashboard</a></li>
							<li><a href=""><i class="fa fa-envelope-o"></i>Inbox</a></li>
							<li class="{{ Route::currentRouteName() == 'listing.index' || Route::currentRouteName() == 'listing.edit' || Route::currentRouteName() == 'listing.create'  ? 'active':'' }}"><a href="{{ route('listing.index') }}"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>My Listings</a></li>
							<li class="{{ Route::currentRouteName() == 'bookmark.index' ? 'active':'' }}"><a href="{{ route('bookmark.index') }}"><i class="fa fa-bookmark"></i>Bookmarks</a></li>
							<li class="{{ Route::currentRouteName() == 'user.edit' ? 'active':'' }}"><a href="{{ route('user.edit', Auth::user()->id) }}"><i class="fa fa-user"></i>Edit Profile</a></li>
							<li class="{{ Route::currentRouteName() == 'settings' ? 'active':'' }}"><a href="{{ route('settings') }}"><i class="fa fa-cog"></i>Account Settings</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-9">
					@yield('dashboard-content')
				</div>
			</div>
		</div>
	@stop
@stop