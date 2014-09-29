<?php

class UsersController extends BaseController {

	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function index()
	{
		$users = User::all();
		return View::make('users/index', ['users' => $users]);
	}

	public function show($username) 
	{
		$user = User::whereU_username($username)->first(); 
		return View::make('users.show', ['user' => $user]);
	}

	public function store() 
	{
		$input = Input::all();
		if ( ! $this->user->fill($input)->isValid())
		{
			return Redirect::back()->withInput()->withErrors($this->user->errors);
		}

		$this->user->U_firstname 	= Input::get('U_firstname');
		$this->user->U_lastname 	= Input::get('U_lastname');
		$this->user->U_email 		= Input::get('U_email');
		$this->user->U_username 	= Input::get('U_username');
		$this->user->U_password 	= Hash::make(Input::get('U_password'));
		$this->user->save();

		if (Auth::attempt(Input::only('U_username', 'U_password')))
		{
			return Redirect::back();
		}

		return Redirect::back()->withInput();
	}
}

