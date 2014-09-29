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
}