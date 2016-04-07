<?php

class SessionsController extends BaseController {
	
	public function create() 
	{
	
		return 'create';
		//if (Auth::check()) return Redirect::to('/admin');
		//return View::make('sessions.create');
	}

	public function store() 
	{
		if (Auth::attempt(Input::only('U_username', 'U_password')))
		{
			return Redirect::back();
		} 

		if (Auth::attempt(['U_email'=> Input::get('U_username'), 'U_password' => Input::get('U_password')])) {
			return Redirect::back();
		}

		return Redirect::back()->withInput()->with('v', 1);
	}

	public function destroy() 
	{
		Auth::logout();
		return Redirect::back();
	}
}