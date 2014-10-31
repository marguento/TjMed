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
	            									->paginate(5);
		} 
		elseif (isset($data['category']) && isset($data['speciality']) && ($data['category'] !='all' || $data['speciality'] != 'all')) 
		{
			if($data['speciality'] != 'all')
			{
				$business = BusinessCategoriesView::whereb_verified(1)
													->whereb_active(1)
													->wheres_id($data['speciality'])
													->paginate(5);
			} else {
				$business = BusinessCategoriesView::whereb_verified(1)
													->whereb_active(1)
													->wherec_id($data['category'])
													->paginate(5);
			}
		} else {
			$business = BusinessRatingView::whereb_verified(1)->whereb_active(1)->paginate(5);
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
		if (Input::hasFile('image'))
		{
		    $doctor->b_image = Input::file('image')->getClientOriginalName();
		} 
		if (!$doctor->isValid(Input::get('curr_doctor')))
		{
			return Redirect::back()->withInput()->withErrors($doctor->errors);
		}
		if (Input::hasFile('image'))
		{
			$destinationPath = app_path() . '/images_server';
			$fileName = 'img_' . round(microtime(true) * 1000) . '_' . Auth::user()->U_username;

			Input::file('image')->move($destinationPath, $fileName);

			$doctor->b_image = $fileName;
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

		$doctor->b_image = $fileName;
		$doctor->save();

		if($add_user == 1) {
			$var = '<div class="alert alert-success" role="alert">
			          <button type="button" class="close" data-dismiss="alert">&times;</button>
			          <strong>¡Éxito!</strong> Doctor agregado correctamente.
			        </div>';
			return Redirect::to('admin/doctores/'.$doctor->B_ID)->with('var', $var);
		} else {
			$specialty = new BusinessHasSpecialties();
			$specialty->businesses_B_ID = $doctor->B_ID;
			$specialty->specialties_S_ID = Input::get('specialty');
			$specialty->save();

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
		$comments = BusinessCommentsView::whereb_id($b_id)->orderBy('C_datetime_created', 'desc')->paginate(5);
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

		return Redirect::to('doctor/' . $data['curr_doctor'] . '#comments');
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

	public function get_data() 
	{
		$string = "";
		$data = Input::all();
		if (isset($data)) {
			$doctor = Business::whereb_id($data['id'])->first();
			$users = User::all();
			$user_owner = [];
			foreach($users as $user) {
				$user_owner[$user->U_username] = $user->U_username;
			}

			if($doctor->b_image !="")
				$img = HTML::image('../app/images_server/' . $doctor->b_image);
			else
				$img = HTML::image('../app/images/default.jpg');

			$string = "" . Form::open(array('url' => 'verify', 'files' => true))
					. " " . Form::hidden('curr_doctor', $doctor->B_ID, array('id' => $doctor->B_ID, 'class' => 'curr_doctor'))
					. "<div class='row'><div class='form-group'>" . 
    				Form::label('created', 'Creado:', array('class' => 'col-md-2 control-label')) . "
    				<div class='col-md-4'><span>".  $doctor->b_joined_date . " </span></div>" .

    				Form::label('created_user', 'Creado por:', array('class' => 'col-sm-2 control-label')) . "
    				<div class='col-md-4'><span><a href='" . url('admin/editar/'.$doctor->b_created_user) ."'>" . $doctor->b_created_user . "</a> </span></div>
  					</div>
					</div>
					<br>
					<div class='row'><div class='form-group'>" .
						Form::label('user_owner', 'Usuario Propietario:', array('class' => 'col-md-2 control-label')) .
					    "<div class='col-md-4'>" .
					    Form::select('user_owner', $user_owner, $doctor->b_user_owner, ['class' => 'form-control', 'id' => 'user_owner']) .
					 "</div>
					  </div>
					</div>

					<br>

					<div class='col-md-12'>
					  <div class='space20'></div>
					  <div class='divider'></div>
					  <div class='space20'></div>
					</div>

					<br>

					<div class='row'>
					  <div class='form-group'>" .
					    Form::label('name', 'Nombre', array('class' => 'col-md-2 control-label')) .
					    "<div class='col-md-4'>" .
					      Form::text('name', $doctor->b_name, array('class' => 'form-control focus')) .
					      "<span class='error_msg'></span>
					    </div>" .

					    Form::label('address', 'Dirección', array('class' => 'col-sm-2 control-label')) .
					    "<div class='col-md-4'>" .
					      Form::text('address', $doctor->b_address, array('class' => 'form-control')) .
					      "<span class='error_msg'></span>
					    </div>
					  </div>
					</div>

					<br>
					<div class='row'>
					  <div class='form-group'>".
					    Form::label('email', 'Correo Electrónico', array('class' => 'col-sm-2 control-label')) .
					    "<div class='col-md-4'>" .
					      Form::text('email', $doctor->b_email, array('class' => 'form-control')) .
					      "<span class='error_msg'></span>
					    </div>" .

					    Form::label('telephone', 'Teléfono', array('class' => 'col-md-2 control-label')) .
					    "<div class='col-md-4' class='error'>" .
					      Form::text('telephone', $doctor->b_telephone, array('class' => 'form-control focus')) .
					      "<span class='error_msg'></span>
					    </div>
					  </div>
					</div>

					<br>

					<div class='row'>
					  <div class='form-group'>" .
					    Form::label('cellphone', 'Celular', array('class' => 'col-sm-2 control-label')) .
					    "<div class='col-md-4'>".
					      Form::text('cellphone', $doctor->b_cellphone, array('class' => 'form-control')) .
					    "</div>
					  </div>
					</div>

					<br>

					<div class='row'>
					  <div class='form-group'>".
					    Form::label('introduction', 'Introducción', array('class' => 'col-md-2 control-label')) .
					    "<div class='col-md-10'>" .
					      Form::textarea('introduction', $doctor->b_introduction, ['class' => 'form-control', 'size' => '1x5']) .
					      "<span class='error_msg'></span>
					    </div>
					  </div>
					</div>

					<br>

					<div class='row'>
					  <div class='form-group'>" .
					    Form::label('description', 'Descripción', array('class' => 'col-md-2 control-label')) .
					    "<div class='col-md-10'>".
					      Form::textarea('description', $doctor->b_description, ['class' => 'form-control', 'size' => '1x5']) .
					      "<span class='error_msg'></span>
					    </div>
					  </div>
					</div>

					<br>

					<h5> Imagenes menores de 2MB </h5>
					<div class='row'>
					  <div class='form-group'>
					    <div class='col-md-2'></div>
					    <div class='col-md-4'>
					      <div class='fileinput fileinput-new' data-provides='fileinput'>
					        <div class='fileinput-new thumbnail' style='max-width: 300px; max-height:270px;'>".
					          	$img
					        . "</div>
					        <div class='fileinput-preview fileinput-exists thumbnail' style='max-width: 300px; max-height: 270px;'></div>
					        <div>
					          <span class='btn btn-default btn-file'><span class='fileinput-new'>Select image</span><span class='fileinput-exists'>Change</span>
					          <input type='file' name='image'></span>
					          <a href='#' class='btn btn-default fileinput-exists' data-dismiss='fileinput'>Remove</a>
					        </div>
					      </div>
					    </div>".
						Form::label('priority', 'Prioridad', array('class' => 'col-sm-2 control-label')) .
					    "<div class='col-md-4'>".
					      Form::select('priority', ['Negocio Básico', 'Negocio Premium'], $doctor->b_priority, ['class' => 'form-control', 'id' => 'priority']) .
					    "</div>
					  </div>
					</div>

					<br>

					<div class='row'>
					  <div class='form-group'>
					    <label for='facebook' class='col-md-2 control-label'><span class='fa fa-facebook'></span>     Facebook</label>
					    <div class='col-md-4'>" .
					      Form::text('facebook', $doctor->b_facebook, array('class' => 'form-control')) .
					    "</div>
					    <label for='twitter' class='col-md-2 control-label'><span class='fa fa-twitter'></span>     Twitter</label>
					    <div class='col-md-4'>".
					      Form::text('twitter', $doctor->b_twitter, array('class' => 'form-control')) .
					    "</div>
					  </div>
					</div>

					<br>

					<div class='row'>
					  <div class='form-group'>
					    <label for='linkedin' class='col-md-2 control-label'><span class='fa fa-linkedin'></span>     Linkedin</label>
					    <div class='col-md-4'>".
					      Form::text('linkedin', $doctor->b_linkedin, array('class' => 'form-control')) .
					    "</div>

					    <label for='youtube' class='col-md-2 control-label'><span class='fa fa-youtube'></span>     Youtube</label>
					    <div class='col-md-4'>".
					       Form::text('youtube', $doctor->b_youtube, array('class' => 'form-control')) .
					    "</div>
					  </div>
					</div>

					<br>

					<div class='row'>
					  <div class='form-group'>
					    <label for='google-plus' class='col-md-2 control-label'><span class='fa fa-google-plus'></span>     Google+</label>
					    <div class='col-md-4'>
					      <input type='text' class='form-control' id='google-plus' value=''>
					    </div>
					    <label for='website' class='col-md-2 control-label'><span class='fa fa-globe'></span>     Sitio Web Personal</label>
					    <div class='col-md-4'>" . 
					      Form::text('website', $doctor->b_website, array('class' => 'form-control')) .
					    "</div>
					  </div>
					</div>

					<br>

					<div class='row'>
					  <div class='form-group'>
					    <div class='col-md-4'></div>
					    <div class='col-md-2'>
					      <input type='submit' class='form-control btn btn-primary' name='submit' id='submit' value='Verificar'>
					    </div>
					    <div class='col-md-2'>
							<input type='submit' class='form-control btn btn-primary' name='submit' id='submit' value='Descartar'>
					    </div>
					  </div>
					</div>
					<div class='col-md-4'></div>" .
					Form::close();
			echo $string;
		}
	}
}