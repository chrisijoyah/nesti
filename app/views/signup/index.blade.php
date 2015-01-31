@extends('layouts.master')
	@section('content')
	<div class="container">
		<div class="row">
        <div class="col-md-offset-4 col-md-4">
          <div class="login-container signup-container">
            <h1>Sign Up</h1>
            <form action="{{ route('signup.create') }}" method="post">
				<div class="signup-roles">
					<p>What are you?</p>
					<label class="radio-inline">
						<input type="radio" name="role" id="inlineRadio1" value="1" checked> Tenant
					</label>
					<label class="radio-inline">
						<input type="radio" name="role" id="inlineRadio2" value="2"> Landlord
					</label>
					<label class="radio-inline">
						<input type="radio" name="role" id="inlineRadio3" value="3"> Agency
					</label>	
				</div>
			  <input class="form-control input-lg" type="text" placeholder="Name" name="name">
              <input class="form-control input-lg" type="text" placeholder="Email" name="email">
              <input class="form-control input-lg" type="password" placeholder="Password" name="password">
              @if ($errors->has())
	              <div class="alert alert-danger" role="alert">
	             	<p>{{ $errors->first('name') }}</p>
	             	<p>{{ $errors->first('role') }}</p>
			        <p>{{ $errors->first('email') }}</p>
			        <p>{{ $errors->first('password') }}</p>
	              </div>
              @endif
              <button class="btn btn-default btn-lg nesti-primary btn-block submit-btn" type="submit">Sign Up</button>        
            </form>
            <p class="agreement">By signing up, I agree to Nesti's  <a href="{{ route('page', 'terms-conditions') }}">Terms and Conditions </a> and <a href="{{ route('page', 'privacy-policy') }}">Privacy Policy</a></p>
            <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
          </div>
        </div>
      </div>
	</div>
	@stop
@stop