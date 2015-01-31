@extends('layouts.master')
	@section('content')
		<div class="container dashboard">
			<div class="row">
				<div class="col-md-3">
					<div class="left-col">
						<ul>
							<li><a href="{{ route('dashboard') }}"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>Dashboard</a></li>
							<li><a href=""><i class="fa fa-envelope-o"></i>Inbox</a></li>
							<li><a href=""><span class="glyphicon glyphicon-list" aria-hidden="true"></span>My Listings</a></li>
							<li><a href=""><i class="fa fa-heart-o"></i>Favourites</a></li>
							<li class="active"><a href="{{ route('settings') }}"><i class="fa fa-cog"></i>Account Settings</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-9">
					<div class="right-col">
						<h1>Account Settings</h1>
						<div class="content">
							<div class="row">
								<div class="col-md-5">

									<div class="form-group">
									    <label for="exampleInputEmail1">Avatar</label>

									   	<img src="{{ Auth::user()->avatar }}" class="avatar img-responsive" alt="">
									   
									  </div>
									
									  <div class="form-group">
									    <label for="exampleInputEmail1">Email Address</label>
									    <input type="email" class="form-control" id="exampleInputEmail1" value="{{ Auth::user()->email }}">
									  </div>
									  <div class="form-group">
									    <label for="exampleInputPassword1">First Name</label>
									    <input type="text" class="form-control" id="exampleInputPassword1" value="{{ Auth::user()->first_name }}">
									  </div>
									  <div class="form-group">
									    <label for="exampleInputPassword1">Last Name</label>
									    <input type="text" class="form-control" id="exampleInputPassword1" value="{{ Auth::user()->last_name }}">
									  </div>
									  <div class="form-group">
									    <label for="exampleInputPassword1">Occupation</label>
									    <input type="text" class="form-control" id="exampleInputPassword1" value="{{ Auth::user()->occupation }}">
									  </div>
									  
									  <div class="form-group">
									    <label for="exampleInputPassword1">Budget</label>
									    <input type="text" class="form-control" id="exampleInputPassword1" value="{{ Auth::user()->budget }}">
									  </div>
	

									<div class="form-group">
									<label for="exampleInputPassword1">Gender</label><br />
										<label class="radio-inline">
										  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
										</label>
										<label class="radio-inline">
										  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
										</label>
									</div>



									  <button type="submit" class="btn btn-default">Save</button>
									
								</div>
								<div class="col-md-7">										
									  <div class="form-group">
									    <label for="exampleInputEmail1">Description</label>
									    <textarea class="form-control">{{ Auth::user()->description }}</textarea>
									  </div>
									 <div class="form-group">
									    <label for="exampleInputEmail1">Interests</label>
									    <textarea class="form-control">{{ Auth::user()->description }}</textarea>
									  </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@stop
@stop