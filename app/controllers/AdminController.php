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
		$users = User::all();
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

	public function edit_doctor($id)
	{
		if($id != 0) {
			$doctor = Business::whereb_id($id)->first();
			$users = User::all();
			$categories = Category::all();
			$cat_v = CategoriesView::whereb_id($id)->get();
			$tag_v = TagsView::whereb_id($id)->get();
			$user_owner = [];
			foreach($users as $user) {
				$user_owner[$user->U_username] = $user->U_username;
			}

			return View::make('admin/edit_doctor', ['doctor' => $doctor, 'user_owner' => $user_owner,
													'categories' => $categories,
													'cat_v' => $cat_v,
													'tag_v' => $tag_v]);
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
}