<?php

class AuthenticationController extends BaseController {

	public function login()
	{
		return View::make('login.index');
	}

	public function handleLogin()
	{
		$rules = array(
			'email' => 'required|email',
			'password' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('login')->withErrors($validator);
		}
		else
		{
			if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
			{
		    	return Redirect::intended('dashboard');
			}
			else
			{
				return Redirect::to('login')->with('message', 'Please check login credentials');
			}
		}
	}

	public function logout()
	{
		Auth::logout();

		return Redirect::intended('/');
	}

}