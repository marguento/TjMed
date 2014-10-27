<?php

class BusinessController extends BaseController {

	public function index()
	{
		$data = Input::all();

		if(isset($data['search']) && $data['search'] != "") {
			$search = $data['search'];
			$business = BusinessCategoriesView::whereb_verified(1)
													->whereb_active(1)
													->where(function($query) use ($search)
	            									{
	                									$query->where('b_name', 'LIKE', '%'.$search.'%')
	                      								->where('b_introduction', 'LIKE', '%'.$search.'%', 'OR')
	                      								->orWhereExists(function($query) use ($search)
	            											{
	                											$query->select(DB::raw(1))
		                      											->from('v_tags')
		                      											->where('T_name', 'LIKE', '%'.$search.'%')
		                      											->whereRaw('v_tags.B_ID = v_business_categories.B_ID');
	            												});
	            									})->groupBy('b_id')
	            									->get();
		} 
		elseif (isset($data['category']) && isset($data['speciality']) && ($data['category'] !='all' || $data['speciality'] != 'all')) 
		{
			if($data['speciality'] != 'all')
			{
				$business = BusinessCategoriesView::whereb_verified(1)
													->whereb_active(1)
													->wheres_id($data['speciality'])
													->get();
			} else {
				$business = BusinessCategoriesView::whereb_verified(1)
													->whereb_active(1)
													->wherec_id($data['category'])
													->get();
			}
		} else {
			$business = BusinessRatingView::whereb_verified(1)->whereb_active(1)->get();
		}
		$categories = Category::all();
		$b_cat = BusinessView::all();
		return View::make('business', ['business' => $business, 
							'categories' => $categories,
							'b_cat' => $b_cat]);
	}

	public function getSpecialties()
	{
		$string = "";
		$data = Input::all();
		if (isset($data)) {
			if ($data['id'] == 'all') {
				$specialties = Specialty::all();
			} else {
				$specialties = Specialty::whereS_id_category($data['id'])->get(); 
			}
		} else {
			$specialties = Specialty::all();
		}

		$string .= '<option value="all">Todas</option>';
		if ($specialties->count()) {
        	foreach ($specialties as $spe) {
            	$string .= '<option value="'. $spe['attributes']['S_ID'] . '">'. $spe['attributes']['S_name'] .'</option>';
        	}
        }
        return $string;
	}

	public function update()
	{
		$doctor = Business::whereb_id(Input::get('curr_doctor'))->first();

		$doctor->b_name 		= Input::get('name');
		$doctor->b_address		= Input::get('address');
		$doctor->b_email 		= Input::get('email');
		$doctor->b_telephone	= Input::get('telephone');
		$doctor->b_cellphone	= Input::get('cellphone');
		$doctor->b_introduction = Input::get('introduction');
		$doctor->b_description	= Input::get('description');
		$doctor->b_facebook		= Input::get('facebook');
		$doctor->b_twitter		= Input::get('twitter');
		// $user->U_google_plus= Input::get('lastname');
		$doctor->b_linkedin		= Input::get('linkedin');
		$doctor->b_youtube		= Input::get('youtube');
		$doctor->b_website		= Input::get('website');
		$doctor->b_updated_at	= date('Y-m-d H:i:s');
		$doctor->b_user_owner	= Input::get('user_owner');
		// print_r($doctor);
		if (!$doctor->isValid(Input::get('curr_doctor')))
		{
			return Redirect::back()->withInput()->withErrors($doctor->errors);
		}

		$doctor->save();
		$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Éxito!</strong> Doctor actualizado correctamente.
		        </div>';
		return Redirect::back()->with('var', $var);
	}

	public function store()
	{
		if( ! Auth::check())
		{
			return Redirect::to('/');
		} 
		$doctor = new Business();
		$add_user				= Input::get('add_user');
		$doctor->b_name 		= Input::get('name');
		$doctor->b_address		= Input::get('address');
		$doctor->b_email 		= Input::get('email');
		$doctor->b_telephone	= Input::get('telephone');
		$doctor->b_cellphone	= Input::get('cellphone');
		$doctor->b_introduction = Input::get('introduction');
		$doctor->b_description	= Input::get('description');
		$doctor->b_facebook		= Input::get('facebook');
		$doctor->b_twitter		= Input::get('twitter');
		// $user->U_google_plus= Input::get('lastname');
		$doctor->b_linkedin		= Input::get('linkedin');
		$doctor->b_youtube		= Input::get('youtube');
		$doctor->b_website		= Input::get('website');
		$doctor->b_joined_date	= date('Y-m-d H:i:s');
		$doctor->b_created_user = Auth::user()->U_username;
		if($add_user == 0) {
			$doctor->b_verified	= 0;

			if(Input::get('user_owner') == 0) {
				$doctor->b_user_owner = 'none';
			} else {
				$doctor->b_user_owner = Auth::user()->U_username;
			}
		} else {
			$doctor->b_verified	= 1;
			$doctor->b_user_owner	= Input::get('user_owner');
			$doctor->b_priority 	= Input::get('priority');
		}


		if (Input::hasFile('image'))
		{
		    $doctor->b_image = Input::file('image')->getClientOriginalName();
		} else {
			$doctor->b_image = "";
		}
		
		
		if (!$doctor->isValid(0))
		{
			return Redirect::back()->withInput()->withErrors($doctor->errors);
		}

		$destinationPath = app_path() . '/images_server';
		$fileName = 'img_' . round(microtime(true) * 1000) . '_' . Auth::user()->U_username;

		Input::file('image')->move($destinationPath, $fileName);

		$doctor->save();

		$specialty = new BusinessHasSpecialties();
		$specialty->businesses_B_ID = $doctor->B_ID;
		$specialty->specialties_S_ID = Input::get('specialty');
		$specialty->save();
		
		if($add_user == 1) {
			$var = '<div class="alert alert-success" role="alert">
			          <button type="button" class="close" data-dismiss="alert">&times;</button>
			          <strong>¡Éxito!</strong> Doctor agregado correctamente.
			        </div>';
			return Redirect::to('admin/doctores/'.$doctor->B_ID)->with('var', $var);
		} else {
			$var = '<div class="alert alert-success" role="alert">
			          <button type="button" class="close" data-dismiss="alert">&times;</button>
			          Los administradores verificarán que los datos ingresados sean correctos. 
			          Gracias por tu registro.
			        </div>';
			return Redirect::to('doctores')->with('var', $var);
		}
	}

	public function add_doctor()
	{
		if( ! Auth::check())
		{
			$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          Antes de agregar negocios, regístrate o inicia sesión en TjMed.
		        </div>';
			return Redirect::to('registrar')->with('var', $var);
		} 

		$specialties = Specialty::all();
		return View::make('add_business', ['specialties' => $specialties]);
	}

	public function show($b_id) 
	{
		$doctor = Business::whereb_id($b_id)->first();
		$b_cat = BusinessView::whereb_id($b_id)->get();
		$comments = BusinessCommentsView::whereb_id($b_id)->get();
		$tags = BusinessTagsView::whereb_id($b_id)->get();

		$sum = 0;
		foreach($comments as $comment)
		{
			$sum += $comment['C_rating'];
		}

		if($sum > 0) {
			$rating = $sum/$comments->count();
		} else {
			$rating = $sum;
		}
		return View::make('doctor_profile', ['doctor' => $doctor, 
												'b_cat' => $b_cat,
												'comments' => $comments,
												'rating' => $rating,
												'tags' => $tags]);
	}

	public function add_review() 
	{
		$data = Input::all();
		$comment 					 = new Comment();
		$comment->C_user 			 = Auth::user()->U_username;
		$comment->C_content 		 = $data['content'];
		$comment->C_datetime_created = date('Y-m-d H:i:s');
		$comment->C_rating 			 = $data['rating'];
		$comment->save();

		$id_c = $comment->C_ID;
		$bhc 			  = new BusinessHasComments();
		$bhc->BC_ID = null;
		$bhc->BC_business = $data['curr_doctor'];
		$bhc->BC_comment  = $id_c;

		$bhc->save();

		return Redirect::to('doctor/' . $data['curr_doctor']);
	}

	public function register_owner($b_id)
	{
		if( ! Auth::check())
		{
			$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          Antes de realizar tu solicitud, regístrate o inicia sesión en TjMed.
		        </div>';
			return Redirect::to('registrar')->with('var', $var);
		} else {
			$verify 			= new VerifyOwner();
			$verify->B_ID 		= $b_id;
			$verify->U_username = Auth::user()->U_username;
			$verify->V_created 	= date('Y-m-d H:i:s');
			$verify->V_verified = '0';
			$verify->save();
			
			$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          Un administrador revisará tu solicitud y se te enviará notificación al verificar los datos</div>';
			return Redirect::to('doctor/'. $b_id)->with('var', $var);
		}
		
	}
}