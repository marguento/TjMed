<?php

class UsersController extends BaseController {

	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function index()
	{
		$users = User::whereU_active('1')->get();
		return View::make('users/index', ['users' => $users]);
	}

	public function show($username) 
	{
		$user = User::whereU_username($username)->first(); 
		return View::make('users.show', ['user' => $user]);
	}

	public function edit()
	{
		$user = User::whereU_username(Auth::user()->U_username)->first();
		$profile = Profile::whereUsername(Auth::user()->U_username)->first();

		$user->U_firstname 	= Input::get('firstname');
		$user->U_lastname 	= Input::get('lastname');
		$user->U_facebook	= Input::get('facebook');
		$user->U_twitter	= Input::get('twitter');
		// $user->U_google_plus= Input::get('lastname');
		$user->U_linkedin	= Input::get('linkedin');
		$user->U_youtube	= Input::get('youtube');
		$user->U_website	= Input::get('website');
		$user->U_description= Input::get('about');
		$user->U_country	= Input::get('country');
		$user->U_state 		= Input::get('state');
		$user->U_city 		= Input::get('city');
		$user->U_hometown 	= Input::get('hometown');
		$user->U_email 		= Input::get('email');
		$user->U_username 	= Input::get('username');
		$user->U_updated_at	= date('Y-m-d H:i:s');
		$user->U_birthdate	= Input::get('birthdate');
		if (Input::hasFile('image'))
		{
		    $user->U_profile_image = Input::file('image')->getClientOriginalName();
		    $destinationPath = app_path() . '/images_server';
			$fileName = 'img_' . round(microtime(true) * 1000) . '_' . Auth::user()->U_username;

			Input::file('image')->move($destinationPath, $fileName);

			$user->U_profile_image = $fileName;
		} 
		if (!$user->isValid(Auth::user()->U_username))
		{
			return Redirect::back()->withInput()->withErrors($user->errors);
		}


		$user->save();
		$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Éxito!</strong> Actualización correcta.
		        </div>';
		return Redirect::back()->with('var', $var);
	}

	public function update($id)
	{
		$user = User::whereU_username($id)->first();

		$user->U_firstname 	= Input::get('firstname');
		$user->U_lastname 	= Input::get('lastname');
		$user->U_level		= Input::get('type');
		$user->U_facebook	= Input::get('facebook');
		$user->U_twitter	= Input::get('twitter');
		// $user->U_google_plus= Input::get('lastname');
		$user->U_linkedin	= Input::get('linkedin');
		$user->U_youtube	= Input::get('youtube');
		$user->U_website	= Input::get('website');
		$user->U_description= Input::get('about');
		$user->U_country	= Input::get('country');
		$user->U_state 		= Input::get('state');
		$user->U_city 		= Input::get('city');
		$user->U_hometown 	= Input::get('hometown');
		$user->U_email 		= Input::get('email');
		$user->U_username 	= Input::get('username');
		$user->U_updated_at	= date('Y-m-d H:i:s');
		$user->U_birthdate	= Input::get('birthdate');
		if (Input::hasFile('image'))
		{
		    $user->U_profile_image = Input::file('image')->getClientOriginalName();
		    $destinationPath = app_path() . '/images_server';
			$fileName = 'img_' . round(microtime(true) * 1000) . '_' . $id;

			Input::file('image')->move($destinationPath, $fileName);

			$user->U_profile_image = $fileName;
		} 
		if (!$user->isValid(Input::get('curr_user')))
		{
			return Redirect::back()->withInput()->withErrors($user->errors);
		}

		$user->save();
		$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Éxito!</strong> Usuario actualizado correctamente.
		        </div>';
		return Redirect::back()->with('var', $var);
	}

	public function destroy($id)
	{
		$user = User::whereU_username($id)->first();
		$user->U_active = 0;
		$user->save();
		return Redirect::back();
	}

	public function store() 
	{
		$input = Input::all();
		if ( ! $this->user->fill($input)->isValid(Input::get('curr_user')))
		{
			return Redirect::back()->withInput()->withErrors($this->user->errors);
		}

		print_r($input);

		$this->user->U_firstname 	= Input::get('U_firstname');
		$this->user->U_lastname 	= Input::get('U_lastname');
		$this->user->U_email 		= Input::get('U_email');
		$this->user->U_username 	= Input::get('U_username');
		$this->user->U_password 	= Hash::make(Input::get('U_password'));
		$this->user->U_created_at	= date('Y-m-d H:i:s');
		$this->user->U_level 		= 0;
		$this->user->U_active		= 1;
		$this->user->save();

		if (Auth::attempt(Input::only('U_username', 'U_password')))
		{
			return Redirect::to('/');
		}

		return Redirect::back()->withInput();
	}

	public function getStates() 
	{
		$string = "";
		$data = Input::all();
		$states = State::all();
		$user_state = 2;
		if ($data['state'] != "")
		{
			$user_state = $data['state'];
		}

		if ($states->count()) {
        	foreach ($states as $state) {
        		if($user_state == $state['attributes']['idestados']) {
            		$string .= '<option value="'. $state['attributes']['idestados'] . '" selected="selected">'. $state['attributes']['estado'] .'</option>';

        		} else {		        		
            		$string .= '<option value="'. $state['attributes']['idestados'] . '">'. $state['attributes']['estado'] .'</option>';
            	}
        	}
        }
        return $string;
	}

	public function getCities() 
	{
		$string = "";
		$data = Input::all();
		
		$user_state = 2;
		$user_city = 15;
		if ($data['state'] != "")
		{
			$user_state = $data['state'];
		}

		if ($data['city'] != "")
		{
			$user_city = $data['city'];
		}

		$cities = City::whereidestado($user_state)->get();

		if ($cities->count()) {
        	foreach ($cities as $city) {
        		if($user_city == $city['attributes']['idmunicipios']) {
            		$string .= '<option value="'. $city['attributes']['idmunicipios'] . '" selected="selected">'. $city['attributes']['municipio'] .'</option>';

        		} else {		        		
            		$string .= '<option value="'. $city['attributes']['idmunicipios'] . '">'. $city['attributes']['municipio'] .'</option>';
            	}
        	}
        }
        return $string;
	}
}

