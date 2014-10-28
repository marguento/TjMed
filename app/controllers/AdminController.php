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
		$users = User::whereU_active(1)->get();
		return View::make('admin/usuarios', ['users' => $users]);
	}

	public function doctores()
	{
		if(!Auth::check() || Auth::user()->U_level != 1)
		{
			return Redirect::to('/');
		} 
		$doctores = Business::whereb_verified(1)->whereb_active(1)->get();
		$non_doctors = Business::whereb_verified(0)->whereb_active(1)->get();
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
		$articles = Article::all();
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
		} else {
			$article = Article::wherea_id($id)->first();
		}
		
		return View::make('admin/art_profile', ['article' => $article]);
	}

	public function art_update()
	{
		if(!Auth::check() || Auth::user()->U_level != 1)
		{
			return Redirect::to('/');
		} 

		if(Input::get('curr_art') == 0)
		{
			$article = new Article();
			$article->A_author = Auth::user()->U_username;
			$article->A_created_at = date('Y-m-d H:i:s');
		} else {
			$article = Article::wherea_id(Input::get('curr_art'))->first();
			$article->A_updated_at = date('Y-m-d H:i:s');
		}
		$article->A_title 			 = Input::get('title_es');
		$article->A_title_en 		 = Input::get('title_en');
		$article->A_introduction 	 = Input::get('introduction_es');
		$article->A_introduction_en = Input::get('introduction_en');
		$article->A_content 	 = Input::get('content_es');
		$article->A_content_en  = Input::get('content_en');
		$article->save();
		return Redirect::to('admin/articulos');
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
		if($id != 0) {
			$doctor = Business::whereb_id($id)->first();
			$users = User::all();
			$categories = Category::all();
			$cat_v = CategoriesView::whereb_id($id)->get();
			$tag_v = TagsView::whereb_id($id)->get();
			$comments = BusinessCommentsView::whereb_id($id)->whereC_active(1)->get();
			$user_owner = [];
			foreach($users as $user) {
				$user_owner[$user->U_username] = $user->U_username;
			}

			return View::make('admin/edit_doctor', ['doctor' => $doctor, 'user_owner' => $user_owner,
													'categories' => $categories,
													'cat_v' => $cat_v,
													'tag_v' => $tag_v,
													'comments' => $comments]);
		} else {
			$users = User::all();
			$user_owner = [];
			foreach($users as $user) {
				$user_owner[$user->U_username] = $user->U_username;
			}
			return View::make('admin/add_doctor', ['user_owner' => $user_owner]);
		}
		
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

		return Redirect::to('admin/doctores/' . $data['curr_doctor']);
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

		return Redirect::to('admin/doctores/' . $data['curr_doctor']);
	}

	public function del_cat($cat, $b_id)
	{
		$cate = BusinessHasSpecialties::wherebusinesses_b_id($b_id)->
										wherespecialties_s_id($cat)->first();

		$cate->delete();
		return Redirect::to('admin/doctores/' . $b_id);
	}

	public function del_tag($tag, $b_id)
	{
		$tags = BusinessHasTags::wherebusinesses_b_id($b_id)->
										wheretags_t_id($tag)->first();

		$tags->delete();
		return Redirect::to('admin/doctores/' . $b_id);
	}

	public function verified($b_id)
	{
		$doctor = Business::where('B_ID', $b_id)
            ->update(array('b_verified' => 1));

		$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Éxito!</strong> Doctor verificado correctamente.
		        </div>';
        return Redirect::to('admin/doctores')->with('var', $var);
	}

	public function disable($b_id)
	{
		$doctor = Business::where('B_ID', $b_id)
            ->update(array('b_active' => 0));

        $var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Éxito!</strong> Doctor archivado.
		        </div>';
        return Redirect::to('admin/doctores')->with('var', $var);
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