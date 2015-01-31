@extends('layouts.master')
	@section('content')
		<div class="container login">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="login-container">
						<h1>Sign In</h1>
						<form action="{{ route('handle_login') }}" method="post">
							<input type="text" class="form-control input-lg" placeholder="Email" name="email">
							<input type="password" class="form-control input-lg" placeholder="Password" name="password">
							@if ($errors->has())
				              <div class="alert alert-danger" role="alert">
						        <p>{{ $errors->first('email') }}</p>
						        <p>{{ $errors->first('password') }}</p>
				              </div>
			              	@endif
			              	@if(Session::get('message'))
				              <div class="alert alert-danger" role="alert">
						        <p>{{ Session::get('message') }}</p>
				              </div>
							@endif	
								<div class="checkbox">
								<label>
							      <input type="checkbox">Remember me
							    </label>
							  </div>
							<p>Not a member? <a href="{{ route('signup.index') }}">Sign Up</a></p>
							<button type="submit" class="btn btn-default btn-lg">Sign In</button>
						</form>
					</div>				
				</div>
			</div>
		</div>
	@stop
@stop

