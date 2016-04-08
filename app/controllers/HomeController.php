<?php

class HomeController extends BaseController {

	public function index()
	{
		if (!Session::has('my.locale')) {
			Session::put('my.locale', 'es');
		}

		if (Session::get('my.locale') == 'es') {
			$bNameColumn = 'b_name';
			$bIntroColumn = 'b_introduction';
			$banners = Banner::select('image_esp as image')->where('active', 1)->get();
		} else {
			$bNameColumn = 'b_name_eng AS b_name';
			$bIntroColumn = 'b_introduction_eng AS b_introduction';
			$banners = Banner::select('image_eng as image')->where('active', 1)->get();
		}

		$business = Business::join('users', 'users.U_username', '=', 'businesses.b_created_user')
			->select($bNameColumn, 
				$bIntroColumn,
				'b_image', 
				'B_ID', 
				'b_email', 
				'b_telephone', 
				'b_address',
				'b_facebook',
				'b_twitter',
				'b_youtube',
				'b_linkedin',
				'b_website',
				DB::raw('truncate(ifnull(((select sum(vbc.C_rating) from tjmed.v_business_comments vbc where (vbc.B_ID = businesses.B_ID)) 
					/ (select count(`vb`.`C_rating`) from `tjmed`.`v_business_comments` `vb` where (`vb`.`B_ID` = `businesses`.`B_ID`))),0),1) AS `rating`'),
				DB::raw('(select count(vb.B_ID) from tjmed.v_business_comments AS vb where (vb.B_ID = businesses.B_ID)) AS comments_count'))
			->where('b_verified', '=', 1)
			->where('b_active', '=' , 1)
			->orderBy('b_joined_date', 'desc')
			->take(3)
			->get();

		$comments = BusinessCommentsView::whereb_verified(1)->whereb_active(1)->orderBy('C_datetime_created', 'desc')->take(3)->get();
		$cats 	  = BusinessCategoriesView::whereb_verified(1)->whereb_active(1)->orderBy('b_joined_date', 'desc')->get();
		$articles = ArticleView::orderBy('A_created_at', 'desc')->take(3)->get();
		
		return View::make('index', ['articles' => $articles,
									'business' => $business,							
									'comments' => $comments,
									'cats'	   => $cats,
									'banners'  => $banners]);
	}

	public function business()
	{
		return View::make('business');
	}

	public function about()
	{
		return View::make('about');
	}

	public function articles()
	{
		$articles = ArticleView::orderBy('A_created_at', 'desc')->paginate(5);
		$top = ArticleView::orderBy('rating', 'desc')->orderBy('article_count', 'desc')->take(5)->get();
		return View::make('articles', ['articles' => $articles,
										'top' => $top]);
	}

	public function contact()
	{
		return View::make('contact');
	}

	public function specialties()
	{
		if (!Session::has('my.locale')) {
			Session::put('my.locale', 'es');
		}

		if (Session::get('my.locale') == 'es') {
			$categories = Category::all();
			$cs = CategoriesSpecialitiesView::orderBy('S_name')->get();
			
		} else {
			$categories = Category::select('C_ID', 
											'C_name_en as C_name', 
											'C_introduction_en as C_introduction', 
											'C_description_en as C_description', 
											'C_image')->get();
			$cs = CategoriesSpecialtiesEngView::orderBy('S_ID')->get();
		}

		return View::make('specialties', ['categories' => $categories,
												'cs' => $cs]);	
	}

	public function speciality($s_id)
	{
		if (!Session::has('my.locale')) {
			Session::put('my.locale', 'es');
		}

		if (Session::get('my.locale') == 'es') {
			$speciality = CategoriesSpecialitiesView::wheres_id($s_id)->first();
			$business = BusinessAtributtesView::wheres_id($s_id)->orderBy('rating', 'desc')->orderBy('comments_count', 'desc')->take(5)->get();
		} else {
			$speciality = CategoriesSpecialtiesEngView::wheres_id($s_id)->first();
			$business = BusinessAtributtesView::wheres_id($s_id)->orderBy('rating', 'desc')->orderBy('comments_count', 'desc')->take(5)->get();
		}
		return View::make('speciality_profile', ['speciality' => $speciality,
													'business' => $business]);
	}

	public function category($c_id)
	{
		if (!Session::has('my.locale')) {
			Session::put('my.locale', 'es');
		}

		if (Session::get('my.locale') == 'es') {
			$category = Category::wherec_id($c_id)->first();
			$specialties = Specialty::wheres_id_category($c_id)->get();
			$business = BusinessAtributtesView::wherec_id($c_id)
												->orderBy('rating', 'desc')
												->orderBy('comments_count', 'desc')
												->groupBy('B_ID')
												->take(5)
												->get();
		} else {
			$category = Category::select('C_ID', 
											'C_name_en as C_name', 
											'C_introduction_en as C_introduction', 
											'C_description_en as C_description', 
											'C_image')
								->wherec_id($c_id)
								->first();
			$specialties = Specialty::select('S_ID', 
											'S_name_en as S_name', 
											'S_introduction_en as S_introduction', 
											'S_description_en as S_description')
									->wheres_id_category($c_id)
									->get();
			$business = BusinessAtributtesView::wherec_id($c_id)
												->orderBy('rating', 'desc')
												->orderBy('comments_count', 'desc')
												->groupBy('B_ID')
												->take(5)
												->get();
		}
		
		return View::make('categorias', ['category' => $category,
											'specialties' => $specialties,
											'business' => $business]);
	}

	public function profile()
	{
		if (!Auth::check())
		{
			return Redirect::to('/');
		}
		
		$countries = Country::all();
		if (Auth::user()->U_country != "")
		{
			$user_c = Auth::user()->U_country;
		} else {
			$user_c = 157;
		}

		$country = Country::where('idCountry', '=', $user_c)->first();
		$state = State::where('idestados', '=', Auth::user()->U_state)->first();
		$city = City::where('idmunicipios', '=', Auth::user()->U_city)->first();

		if ($state != "" && $city != "") {
			$location = $city->municipio . ', ' . $state->estado . ', ' . $country->countryName;
		} else {
			$location = $country->countryName;
		}
		

		$reviews = UserReviewView::whereC_user(Auth::user()->U_username)->get();

		return View::make('user_profile', ['countries' => $countries, 'user_c' => $user_c,
		 									'reviews' => $reviews, 'location' => $location]);
	}

	public function register()
	{
		if (Auth::check())
		{
			return Redirect::to('/');
		}
		return View::make('registro');
	}

	public function login()
	{
		if (Auth::check())
		{
			return Redirect::to('/');
		}
		return View::make('iniciarsesion');
	}

	public function switch_spanish() 
	{
		Session::put('my.locale', 'es');
		return Redirect::back();
	}

	public function switch_english() 
	{
		Session::put('my.locale', 'en');
		return Redirect::back();
	}

	public function user($id)
	{
		$user = User::whereU_username($id)->first();
		$reviews = UserReviewView::whereC_user($id)->get();

		if ($user->U_country != "")
		{
			$user_c = $user->U_country;
		} else {
			$user_c = 157;
		}

		$country = Country::where('idCountry', '=', $user_c)->first();
		$state = State::where('idestados', '=', $user->U_state)->first();
		$city = City::where('idmunicipios', '=', $user->U_city)->first();

		if ($state != "" && $city != "") {
			$location = $city->municipio . ', ' . $state->estado . ', ' . $country->countryName;
		} else {
			$location = $country->countryName;
		}
		return View::make('profile', ['user' => $user, 'location' => $location, 'reviews' => $reviews]);
	}

}
