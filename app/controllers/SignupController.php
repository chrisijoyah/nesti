<?php

class SignupController extends BaseController {
	
	public function getIndex()
	{
		return View::make('signup.index');
	}

	public function postIndex()
	{
		$rules = [
			'role' => 'required',
			'name' => 'required',
		    'email' => 'required|email|unique:users',
		    'password' => 'required|min:8',
		];

		$validator = Validator::make(Input::all(), $rules);
		
	    if ($validator->fails())
	    {
	        return Redirect::to('signup')->withErrors($validator);
	    }

	   	// Create new user
	    if ($validator->passes()) {
			$role = Role::find(Input::get('role'));
			
			$user = new User;
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->activation_token = str_random(30);
			$user->role_id = $role->id;
			$user->save();

			$user->roles()->attach($role);

			// Send signup email
			Mail::send('emails.signup', array('user' => $user, 'activation_token' => $user->activation_token), function($message) use($user)
			{
			    $message->to($user->email, $user->name)->subject('Welcome to Nesti!');
			    $message->from('noreply@nesti.co.uk', 'Nesti');
			});

			// Authenticate user and redirect to dashboard
			Auth::login($user);

			return Redirect::route('user.edit', $user->id);
			 
	    }
	}

	public function activate($activation_token)
	{
		$user = User::where('activation_token', $activation_token)->firstOrFail();
		
		if($user){
			$user->activated = true;
			$user->save();

			Auth::login($user);

			return Redirect::to('dashboard')->with('success', 'Congratulations your account has not been activated.');
		}
	}
}