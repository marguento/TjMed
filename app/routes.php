<?php

Route::get('/', 'HomeController@index');
Route::resource('doctores', 'BusinessController@index');
Route::get('articulos', 'HomeController@articles');
Route::get('especialidades', 'HomeController@specialties');
Route::get('categoria/{category}', 'HomeController@category');
Route::get('especialidad/{especialidad}', 'HomeController@speciality');
Route::get('acerca', 'HomeController@about');
Route::get('contacto', 'HomeController@contact');
Route::get('registrar', 'HomeController@register');
Route::get('perfil', 'HomeController@profile');

Route::get('en', 'HomeController@switch_english');
Route::get('es', 'HomeController@switch_spanish');

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');
Route::resource('users', 'UsersController');
Route::get('admin/', 'AdminController@index');
Route::get('admin/usuarios', 'AdminController@usuarios');
Route::get('admin/doctores', 'AdminController@doctores');

Route::get('admin/articulos', 'AdminController@articles');
Route::get('admin/articulo/{id_a}', 'AdminController@article');
Route::post('article/update', 'AdminController@art_update');

Route::get('admin/especialidades', 'AdminController@specialties');
Route::get('admin/especialidad/{id_specialty}/{id_c}', 'AdminController@specialty');
Route::post('specialty/update', 'AdminController@spe_update');
Route::get('admin/categoria/{id_category}', 'AdminController@category');
Route::post('category/update', 'AdminController@cat_update');
Route::post('category/add', 'AdminController@cat_add');
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
Route::get('agregar', 'BusinessController@add_doctor');
Route::get('doctor/{id_doctor}', 'BusinessController@show');
Route::get('doctores/{filtro}', 'BusinessController@index');
Route::get('owner/{doctor}', 'BusinessController@register_owner');
Route::get('articulo/{id_articulo}', 'ArticleController@show');
Route::post('article/review', 'ArticleController@add_review');

Route::post('doctores/store', 'BusinessController@store');
Route::post('doctor/review', 'BusinessController@add_review');

Route::get('admin/verified/{b_id}', 'AdminController@verified');
Route::get('admin/disable/{b_id}', 'AdminController@disable');
Route::post('getStates', 'UsersController@getStates');
Route::post('getCities', 'UsersController@getCities');

Route::post('getReview', 'BusinessController@edit_review');

Route::post('verify', 'AdminController@verify');

Route::post('edit_user', 'UsersController@edit');
Route::get('usuario/{id_user}', 'HomeController@user');

Route::get('admin/del_rev/{c_id}/{doctor}', 'AdminController@del_rev');
Route::post('getDoctorData', 'BusinessController@get_data');
Route::post('edit_review', 'BusinessController@update_review');

Route::get('del_review/{id}', 'BusinessController@delete_review');

Route::get('mail', function() {
    mail('eira.rangel@gmail.com', 'My Subject', 'wawis');
    // I'm creating an array with user's info but most likely you can use $user->email or pass $user object to closure later
    // $user = array(
    //     'email'=>'eira.rangel@gmail.com',
    //     'name'=>'Laravelovich'
    // );

    // // the data that will be passed into the mail view blade template
    // $data = array(
    //     'detail'=>'Your awesome detail here',
    //     'name'  => $user['name']
    // );

    // // use Mail::send function to send email passing the data and using the $user variable in the closure
    // Mail::send('emails.welcome', $data, function($message) use ($user)
    // {
    //   $message->from('admin@site.com', 'Site Admin');
    //   $message->to($user['email'], $user['name'])->subject('Welcome to My Laravel app!');
    // });
});


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
        $user->U_username       = $me['name'];
        $user->U_firstname      = $me['first_name'];
        $user->U_lastname       = $me['last_name'];
        $user->U_email          = $me['email'];
        $user->U_profile_image  = 'https://graph.facebook.com/'.$uid.'/picture?type=large';
        $user->U_password       = Hash::make('facebook_' . $me['name']);
        $user->U_level          = 0; //usuario normal
        $user->U_active         = 1;
        $user->U_created_at     = date('Y-m-d H:i:s');
        $user->U_facebook       = 'facebook.com/' . $uid;
        $user->U_oauth_provider = 1; //fb
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