@extends('layouts.dashboard')
	@section('dashboard-content')
		<div class="right-col">
			<h1>Dashboard</h1>
			<p>Welcome {{ Auth::user()->name }}!</p>
			@if(Session::get('success'))
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
					</div>
				</div>
			@endif	
		</div>
	@stop
@stop