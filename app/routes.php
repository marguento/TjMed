<?php

Route::get('/', 'HomeController@index');
Route::resource('doctores', 'BusinessController@index');
Route::get('articulos', 'HomeController@articles');
Route::get('especialidades', 'HomeController@specialties');
Route::get('acerca', 'HomeController@about');
Route::get('contacto', 'HomeController@contact');
Route::get('registrar', 'HomeController@register');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');
Route::resource('users', 'UsersController');
Route::get('admin/', 'AdminController@index');
Route::get('admin/usuarios', 'AdminController@usuarios');
Route::get('admin/doctores', 'AdminController@doctores');
Route::get('admin/editar/{username}', 'AdminController@editUser');
Route::get('admin/doctores/{username}', 'AdminController@edit_doctor');
Route::post('admin/doctores/get_specialties', 'AdminController@get_specialties');
Route::get('admin/doctores/del_cat/{cat}/{b_id}', 'AdminController@del_cat');
Route::get('admin/doctores/del_tag/{tag}/{b_id}', 'AdminController@del_tag');
Route::get('admin/delete/{username}', 'UsersController@destroy');
Route::post('doctores/add_cat', 'AdminController@add_cat');
Route::post('doctores/add_tag', 'AdminController@add_tag');
//Route::post('editUser', 'UsersController@editUser')
Route::post('getSpecialties', 'BusinessController@getSpecialties');
Route::post('doctores/update', 'BusinessController@update');
Route::post('doctores/store', 'BusinessController@store');
Route::get('admin/verified/{b_id}', 'AdminController@verified');
Route::get('admin/disable/{b_id}', 'AdminController@disable');
Route::post('getStates', 'UsersController@getStates');
Route::post('getCities', 'UsersController@getCities');

Route::get('login/fb', function() {
    $facebook = new Facebook(Config::get('facebook'));
    $params = array(
        'redirect_uri' => url('/login/fb/callback'),
        'scope' => 'email',
    );
    return Redirect::to($facebook->getLoginUrl($params));
});

Route::get('login/fb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

    $me = $facebook->api('/me');

    $profile = Profile::whereUid($uid)->first();
    if (empty($profile)) {

        $user = new User;
        $user->U_username = $me['name'];
        $user->U_firstname = $me['first_name'];
        $user->U_lastname = $me['last_name'];
        $user->U_email = $me['email'];
        $user->U_profile_image = 'https://graph.facebook.com/'.$me['name'].'/picture?type=large';
        $user->U_password = Hash::make('facebook_' . $me['name']);
        $user->save();

        $profile = new Profile();
        $profile->uid = $uid;
        $profile->username = $me['name'];
        $profile = $user->profiles()->save($profile);
    }

    $profile->access_token = $facebook->getAccessToken();
    $profile->save();

    $username = $profile->username;
    $user = User::whereU_username($username)->first(); 

    $session['U_username'] = $user->U_username;
    $session['U_password'] = 'facebook_' . $user->U_username;

    Auth::attempt($session);

    return Redirect::to('/');
});