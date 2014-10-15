<?php

class BusinessController extends BaseController {

	public function index()
	{
		$business = Business::all();
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
		$doctor = new Business();
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
		$doctor->b_user_owner	= Input::get('user_owner');
		$doctor->b_verified		= 1;
		$doctor->b_priority 	= Input::get('priority');
		// print_r($doctor);
		if (!$doctor->isValid(0))
		{
			return Redirect::back()->withInput()->withErrors($doctor->errors);
		}

		$doctor->save();
		$var = '<div class="alert alert-success" role="alert">
		          <button type="button" class="close" data-dismiss="alert">&times;</button>
		          <strong>¡Éxito!</strong> Doctor agregado correctamente.
		        </div>';
		return Redirect::to('admin/doctores/'.$doctor->B_ID)->with('var', $var);
	}
}