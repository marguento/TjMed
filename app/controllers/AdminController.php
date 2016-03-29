<?php

class AdminController extends BaseController {

	public function index()
	{
		if(!Auth::check() || Auth::user()->U_level != 1)
		{
			return Redirect::to('/');
		} 
		return View::make('admin/dashboard');
	}

	public function usuarios()
	{
		if(!Auth::check() || Auth::user()->U_level != 1)
		{
			return Redirect::to('/');
		} 
		$users = User::whereU_active(1)->orderBy('U_created_at', 'desc')->get();
		return View::make('admin/usuarios', ['users' => $users]);
	}

	public function doctores()
	{
		if(!Auth::check() || Auth::user()->U_level != 1)
		{
			return Redirect::to('/');
		} 
		$doctores = Business::whereb_verified(1)->whereb_active(1)->orderBy('b_joined_date', 'desc')->get();
		$non_doctors = BusinessRatingView::whereb_verified(0)->whereb_active(1)->orderBy('b_joined_date', 'desc')->get();
		$b_cat = BusinessView::all();
		return View::make('admin/doctores', ['doctores' => $doctores, 'non_doctors' => $non_doctors, 
											'b_cat' => $b_cat]);
	}

	public function articles()
	{
		if(!Auth::check() || Auth::user()->U_level != 1)
		{
			return Redirect::to('/');
		} 
		$articles = ArticleView::all();
		return View::make('admin/articulos', ['articles' => $articles]);
	}

	public function article($id)
	{
		if(!Auth::check() || Auth::user()->U_level != 1)
		{
			return Redirect::to('/');
		} 

		if($id == 0)
		{
			$article = new Article();
			$article->A_ID = 0;
			$article->A_author = Auth::user()->U_username;
		} else {
			$article = Article::wherea_id($id)->first();
		}

		$users = User::whereU_active(1)->get();
		$authors = [];
		foreach($users as $user) {
			$authors[$user->U_username] = $user->U_firstname . ' ' . $user->U_lastname;
		}
		
		return View::make('admin/art_profile', ['article' => $article,
												'authors' => $authors]);
	}

	public function art_update()
	{
		if(!Auth::check() || Auth::user()->U_level != 1)
		{
			return Redirect::to('/');
		} 

		$update = '';

		if(Input::get('curr_art') == 0)
		{
			$article = new Article();
			$article->A_created_at = date('Y-m-d H:i:s');
			$update = 1;
		} else {
			$article = Article::wherea_id(Input::get('curr_art'))->first();
			$article->A_updated_at = date('Y-m-d H:i:s');
		}
		$article->A_author 		 = Input::get('author');
		$article->A_title 		 = Input::get('title_es');
		$article->A_introduction = Input::get('introduction_es');
		$article->A_content 	 = Input::get('content_es');

		
		if (Input::hasFile('image'))
		{
		    $article->A_image = Input::file('image');
		    $update = 1;
		} 

		if (!$article->isValid($update))
		{
			$var = '<div class="alert alert-danger" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Error!</strong> Hay algunos errores en el registro, favor de corregirlos.
		        </div>';
			return Redirect::back()->withInput()->withErrors($article->errors)->with('var', $var);
		}

		if (Input::hasFile('image'))
		{
		    $destinationPath = public_path() . '/images_server';
			$fileName = 'img_' . round(microtime(true) * 1000);

			Input::file('image')->move($destinationPath, $fileName);

			$article->A_image = $fileName;
		} 

		$article->save();
		if(Input::get('curr_art') == 0)
		{
			return Redirect::to('admin/articulos');
		} else {
			$var = '<div class="alert alert-success" role="alert">
			          <button type="button" class="close" data-dismiss="alert">&times;</button>
			          <strong>¡Éxito!</strong> Cambio registrados.
			        </div>';
			return Redirect::back()->with('var', $var);
		}
	}

	public function delete_article($id) {
		ArticleHasImages::where('AI_article', $id)->delete();
		ArticleHasComments::where('AHC_article', $id)->delete();
		ArticleHasTags::where('AT_article', $id)->delete();
		ArticleHasArticleCategories::where('AAC_article', $id)->delete();
		Article::destroy($id);

		$var = '<div class="alert alert-success" role="alert">
			          <button type="button" class="close" data-dismiss="alert">&times;</button>
			          <strong>¡Éxito!</strong> Artículo eliminado.
			        </div>';
		return Redirect::back()->with('var', $var);
	}

	public function specialties()
	{
		if(!Auth::check() || Auth::user()->U_level != 1)
		{
			return Redirect::to('/');
		} 
		$categories = AdminCategoriesView::all();
		return View::make('admin/especialidades', ['categories' => $categories]);
	}

	public function category($id)
	{
		if(!Auth::check() || Auth::user()->U_level != 1)
		{
			return Redirect::to('/');
		} 
		if($id != 0) {
			$category = AdminCategoriesView::wherec_id($id)->first();
			$specialties = Specialty::whereS_id_category($id)->get();
			return View::make('admin/cat_profile', ['category' => $category,
														'specialties' => $specialties]);
		} else {
			return View::make('admin/new_cat');
		}
	}

	public function delete_category($id) {
		$specialties = Specialty::where('S_id_category', $id)->get();
		foreach($specialties as $specialty) {
			BusinessHasSpecialties::where('specialties_S_ID', $specialty->S_ID)->delete();
			Specialty::destroy($specialty->S_ID);
		}

		Category::destroy($id);

		$var = '<div class="alert alert-success" role="alert">
			          <button type="button" class="close" data-dismiss="alert">&times;</button>
			          <strong>¡Éxito!</strong> Categoría de especialidades eliminada.
			        </div>';
		return Redirect::to("/admin/especialidades")->with('var', $var);
	}

	public function delete_specialty($id) {
		$specialty = Specialty::find($id);
		$category_id = $specialty->S_id_category;

		BusinessHasSpecialties::where('specialties_S_ID', $specialty->S_ID)->delete();
		Specialty::destroy($id);
		
		$var = '<div class="alert alert-success" role="alert">
			          <button type="button" class="close" data-dismiss="alert">&times;</button>
			          <strong>¡Éxito!</strong> Especialidad eliminada.
			        </div>';
		return Redirect::to("/admin/categoria/" . $category_id)->with('var', $var);
	}

	public function spe_update() 
	{
		if(!Auth::check() || Auth::user()->U_level != 1)
		{
			return Redirect::to('/');
		} 

		if(Input::get('curr_spe') == 0) 
		{
			$specialty = new Specialty();
		} else {
			$specialty 					 = Specialty::wheres_id(Input::get('curr_spe'))->first();
		}
		$specialty->S_name 			 = Input::get('title_es');
		$specialty->S_name_en 		 = Input::get('title_en');
		$specialty->S_introduction 	 = Input::get('introduction_es');
		$specialty->S_introduction_en = Input::get('introduction_en');
		$specialty->S_description 	 = Input::get('description_es');
		$specialty->S_description_en  = Input::get('description_en');
		$specialty->S_id_category 	= Input::get('category');
		$specialty->save();
		return Redirect::to('admin/categoria/' . $specialty->S_id_category);
	}

	public function cat_update() 
	{
		if(!Auth::check() || Auth::user()->U_level != 1)
		{
			return Redirect::to('/');
		} 

		$category 					 = Category::wherec_id(Input::get('curr_cat'))->first();
		$category->C_name 			 = Input::get('title_es');
		$category->C_name_en 		 = Input::get('title_en');
		$category->C_introduction 	 = Input::get('introduction_es');
		$category->C_introduction_en = Input::get('introduction_en');
		$category->C_description 	 = Input::get('description_es');
		$category->C_description_en  = Input::get('description_en');
		$category->save();
		return Redirect::back();
	}

	public function cat_add() 
	{
		if(!Auth::check() || Auth::user()->U_level != 1)
		{
			return Redirect::to('/');
		} 

		$category 					 = new Category();
		$category->C_name 			 = Input::get('title_es');
		$category->C_name_en 		 = Input::get('title_en');
		$category->C_introduction 	 = Input::get('introduction_es');
		$category->C_introduction_en = Input::get('introduction_en');
		$category->C_description 	 = Input::get('description_es');
		$category->C_description_en  = Input::get('description_en');
		$category->save();
		return Redirect::to('admin/especialidades');
	}

	public function specialty($id, $cat)
	{
		if(!Auth::check() || Auth::user()->U_level != 1)
		{
			return Redirect::to('/');
		} 

		if($id == 0)
		{
			$specialty = new Specialty();
			$specialty->S_ID = 0;
			$specialty->S_id_category = $cat;
		} else {
			$specialty = Specialty::wheres_id($id)->first();
		}
		
		$categories = Category::all();
		$cat = array();
		foreach($categories as $c) 
		{
			$cat[$c->C_ID] = $c->C_name;
		}
		return View::make('admin/spe_profile', ['specialty' => $specialty,
												'cat' => $cat]);
	}

	public function edit_doctor($id)
	{
		$aimed = array();
		$aimed[0] = "Familiar";
		$aimed[1] = "Adultos";
		$aimed[2] = "Niños";

		if($id != 0) {
			$doctor = BusinessRatingView::whereb_id($id)->first();
			$users = User::all();
			$categories = Category::all();
			$cat_v = CategoriesView::whereb_id($id)->get();
			$tag_v = TagsView::whereb_id($id)->get();
			$comments = BusinessCommentsView::whereb_id($id)->whereC_active(1)->get();
			$hours = BusinessHours::where('id_business','=',$id)->get();
			$user_owner = [];
			foreach($users as $user) {
				$user_owner[$user->U_username] = $user->U_username;
			}

			return View::make('admin/edit_doctor', ['doctor' => $doctor, 'user_owner' => $user_owner,
													'categories' => $categories,
													'cat_v' => $cat_v,
													'tag_v' => $tag_v,
													'comments' => $comments,
													'hours' => $hours,
													'aimed' => $aimed]);
		} else {
			$users = User::all();
			$user_owner = [];
			foreach($users as $user) {
				$user_owner[$user->U_username] = $user->U_username;
			}
			return View::make('admin/add_doctor', ['user_owner' => $user_owner,
													'aimed' => $aimed]);
		}
		
	}

	public function banner()
	{
		$banners = Banner::all();

		return View::make('admin/banner', ['banners' => $banners]);
	}

	public function add_banner() 
	{
		$banner = new Banner();
		$banner->image_esp = Input::file('image_esp');
		$banner->image_eng = Input::file('image_eng');

		if (!$banner->isValid())
		{
			$error_msg = "Alguno de los datos es incorrecto. Por favor, trata de nuevo.";
			
			return Redirect::back()->withInput()->withErrors($banner->errors)->with('error_msg', $error_msg);
		}

		$maxHeight = 450;
	    $maxWidth = 1920;
	    list($width, $height) = getimagesize($banner->image_esp);
	    list($width2, $height2) = getimagesize($banner->image_eng);

	    if ($width != $maxWidth || $height != $maxHeight || $width2 != $maxWidth || $height2 != $maxHeight ) 
	    {
	    	$error_msg = "El tamaño de las dos imágenes debe ser 1920 x 450";
	    	return Redirect::back()->withInput()->with('error_msg', $error_msg);
	    }

	    $destinationPath = public_path() . '/images_server';
		$fileName_esp = 'banner_' . round(microtime(true) * 1000) . '_esp';
		$fileName_eng = 'banner_' . round(microtime(true) * 1000) . '_eng';

		Input::file('image_esp')->move($destinationPath, $fileName_esp);
		Input::file('image_eng')->move($destinationPath, $fileName_eng);

		$banner->image_esp = $fileName_esp;
		$banner->image_eng = $fileName_eng;
		$banner->active = 0;

		$banner->save();
		$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Éxito!</strong> Banner agregado correctamente.
		        </div>';
		return Redirect::back()->with('var', $var);
	}

	public function delete_banner($id) 
	{
		$banner = Banner::find($id);
		$banner->delete();

		$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Éxito!</strong> Banner eliminado correctamente.
		        </div>';
		return Redirect::back()->with('var', $var);
	}

	public function show_banner($id, $active) {
		$banner = Banner::find($id);
		$banner->active = $active;
		$banner->save();

		$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Éxito!</strong> Cambios del banner guardados correctamente.
		        </div>';
		return Redirect::back()->with('var', $var);
	}

	public function update_banner()
	{
		$banner = Banner::find(Input::get('rowid'));

		if (Input::get('column') == 'image_esp') {
			$tmp = $banner->image_eng;
		} else {
			$tmp = $banner->image_esp;
		}

		$banner->image_esp = Input::file('image_edit');
		$banner->image_eng = Input::file('image_edit');

		if (!$banner->isValid())
		{
			$error_msg = "Alguno de los datos es incorrecto. Por favor, trata de nuevo.";
			$var = '<div class="alert alert-danger" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Error!</strong> La imagen debe estar en formato jpg, png o jpeg.
		        </div>';
			return Redirect::back()->with('var', $var);
		}

		$maxHeight = 450;
	    $maxWidth = 1920;
	    list($width, $height) = getimagesize(Input::file('image_edit'));

	    if ($width != $maxWidth || $height != $maxHeight) 
	    {
	    	$var = '<div class="alert alert-danger" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Error!</strong> El tamaño de la imagen debe ser 1920 x 450.
		        </div>';
		        return Redirect::back()->with('var', $var);
	    }

	    $destinationPath = public_path() . '/images_server';

	    if (Input::get('column') == 'image_esp') {
	    	$fileName = 'banner_' . round(microtime(true) * 1000) . '_esp';
	    	Input::file('image_edit')->move($destinationPath, $fileName);
			$banner->image_eng = $tmp;
			$banner->image_esp = $fileName;
		} else {
			$fileName_eng = 'banner_' . round(microtime(true) * 1000) . '_eng';
			Input::file('image_edit')->move($destinationPath, $fileName);
			$banner->image_esp = $tmp;
			$banner->image_eng = $fileName;
		}

		$banner->save();

		$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Éxito!</strong> Banner editado correctamente.
		        </div>';
		return Redirect::back()->with('var', $var);
		
	}

	public function editUser($id)
	{
		if(!Auth::check() || Auth::user()->U_level != 1)
		{
			return Redirect::to('/');
		} 
		$user = User::whereU_username($id)->first(); 
		$countries = Country::all();
		if ($user->U_country != "")
		{
			$user_c = $user->U_country;
		} else {
			$user_c = 157;
		}
		return View::make('admin/edit_user', ['user' => $user, 'countries' => $countries, 'user_c' => $user_c]);
	}

	public function get_specialties()
	{
		$string = "";
		$data = Input::all();
		$specialties = Specialty::whereS_id_category($data['id'])->get(); 

		if ($specialties->count()) {
        	foreach ($specialties as $spe) {
            	$string .= '<option value="'. $spe['attributes']['S_ID'] . '">'. $spe['attributes']['S_name'] .'</option>';
        	}
        }
        return $string;
	}

	public function add_cat() 
	{
		$data = Input::all();

		$cat = new BusinessHasSpecialties();
		$cat->businesses_B_ID 	= $data['curr_doctor'];
		$cat->specialties_S_ID 	= $data['speciality'];
		$cat->save();

		$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          Categoría agregada.
		        </div>';

		return Redirect::to('admin/doctores/' . $data['curr_doctor'])->with('var', $var)->with('ver', 1);;
	}

	public function add_tag() 
	{
		$data = Input::all();
		$ntag = new Tag();
		$ntag->T_name = $data['tags'];
		$ntag->save();

		$tag_id = $ntag->T_ID;

		$tag = new BusinessHasTags();
		$tag->businesses_B_ID 	= $data['curr_doctor'];
		$tag->tags_T_ID 		= $tag_id;
		$tag->save();

		$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          Etiqueta agregada.
		        </div>';

		return Redirect::to('admin/doctores/' . $data['curr_doctor'])->with('var', $var)->with('ver', 1);;
	}

	public function del_cat($cat, $b_id)
	{
		$cate = BusinessHasSpecialties::wherebusinesses_b_id($b_id)->
										wherespecialties_s_id($cat)->first();

		$cate->delete();
		$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          Categoría eliminada.
		        </div>';
		return Redirect::to('admin/doctores/' . $b_id)->with('var', $var)->with('ver', 1);;
	}

	public function del_tag($tag, $b_id)
	{
		$tags = BusinessHasTags::wherebusinesses_b_id($b_id)->
										wheretags_t_id($tag)->first();

		$tags->delete();
		$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          Etiqueta eliminada.
		        </div>';
		return Redirect::to('admin/doctores/' . $b_id)->with('var', $var)->with('ver', 1);;
	}

	public function verified($b_id)
	{
		$doctor = Business::where('B_ID', $b_id)
            ->update(array('b_verified' => 1));

        $count = Business::where('b_verified', 0)->where('b_active', 1)->get();

		$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Éxito!</strong> Doctor verificado correctamente.
		        </div>';
		if($count->count() == 0)
		{
			return Redirect::to('admin/doctores')->with('var', $var);
		} else {
			return Redirect::to('admin/doctores')->with('var', $var)->with('ver', 1);
		}
        
	}

	public function disable($b_id)
	{
		$doctor = Business::where('B_ID', $b_id)
            ->update(array('b_active' => 0));

        $var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Éxito!</strong> Doctor archivado.
		        </div>';
		$count = Business::where('b_verified', 0)->where('b_active', 1)->get();
		if($count->count() == 0)
		{
			return Redirect::to('admin/doctores')->with('var', $var);
		} else {
			return Redirect::to('admin/doctores')->with('var', $var)->with('ver', 1);
		}
        
	}

	public function verify()
	{
		if(Input::get('submit') == 'Verificar') {
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
			$doctor->b_google_plus	= Input::get('google_plus');
			$doctor->b_linkedin		= Input::get('linkedin');
			$doctor->b_youtube		= Input::get('youtube');
			$doctor->b_website		= Input::get('website');
			$doctor->b_updated_at	= date('Y-m-d H:i:s');
			$doctor->b_user_owner	= Input::get('user_owner');
			$doctor->b_latitude		= Input::get('latitude');
			$doctor->b_longitude	= Input::get('longitude');
			$doctor->b_map			= Input::get('map_c');
			$doctor->b_verified		= 1;
			$doctor->b_aimed 		= Input::get('aimed');
			// print_r($doctor);

			$update = '';
			if (Input::hasFile('image'))
			{
			    $doctor->b_image = Input::file('image')->getClientOriginalName();
			    $update = 1;
			} 


			if (!$doctor->isValid(Input::get('curr_doctor'), $update))
			{
				$var = '<div class="alert alert-danger" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Error!</strong> Hay algunos errores en el registro, favor de corregirlos.
		        </div>';
				return Redirect::back()->withInput()->withErrors($doctor->errors)->with('var', $var)->with('ver', 1);
			}
			if (Input::hasFile('image'))
			{
				$destinationPath = public_path() . '/images_server';
				$fileName = 'img_' . round(microtime(true) * 1000) . '_' . Auth::user()->U_username;

				Input::file('image')->move($destinationPath, $fileName);

				$doctor->b_image = $fileName;
			}

			$doctor->save();

			$tag = TagsView::whereb_id(Input::get('curr_doctor'))->pluck('T_name');

			$tag_name = Input::get('other');
			
			if( $tag_name != $tag)
			{
				$ntag = new Tag();
				$ntag->T_name = $tag_name;
				$ntag->save();

				$tag_id = $ntag->T_ID;

				$tag = new BusinessHasTags();
				$tag->businesses_B_ID 	= $doctor->B_ID;
				$tag->tags_T_ID 		= $tag_id;
				$tag->save();
			}

			$specialty = new BusinessHasSpecialties();
			$specialty->businesses_B_ID = $doctor->B_ID;
			$specialty->specialties_S_ID = Input::get('specialty');
			$specialty->save();

             $var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Éxito!</strong> Doctor verificado.
		        </div>';
		} else {
			$doctor = Business::where('B_ID', Input::get('curr_doctor'))
            ->update(array('b_active' => 0));

        	$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Éxito!</strong> Doctor archivado.
		        </div>';
		}
		$count = Business::where('b_verified', 0)->where('b_active', 1)->get();
		if($count->count() == 0)
		{
			return Redirect::to('admin/doctores')->with('var', $var);
		} else {
			return Redirect::to('admin/doctores')->with('var', $var)->with('ver', 1);
		}
	}

	public function del_rev($id, $doctor)
	{
		$comment = Comment::wherec_id($id)
				->update(array('C_active' => 0));
		$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Éxito!</strong> Reseña archivada.
		        </div>';
        return Redirect::to('admin/doctores/' . $doctor)->with('var', $var);
	}
}