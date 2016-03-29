<?php

class HomeController extends BaseController {

	public function index()
	{
		//$business = Business::orderBy('b_joined_date','desc')->take(3)->get();
		$business = BusinessRatingView::whereb_verified(1)->whereb_active(1)->orderBy('b_joined_date', 'desc')->take(3)->get();
		$comments = BusinessCommentsView::whereb_verified(1)->whereb_active(1)->orderBy('C_datetime_created', 'desc')->take(3)->get();
		$cats 	  = BusinessCategoriesView::whereb_verified(1)->whereb_active(1)->orderBy('b_joined_date', 'desc')->get();
		$articles = ArticleView::orderBy('A_created_at', 'desc')->take(3)->get();
		if (!Session::has('my.locale')) {
			Session::put('my.locale', 'es');
		}

		if (Session::get('my.locale') == 'es') {
			$banners = Banner::select('image_esp as image')->where('active', 1)->get();
		} else {
			$banners = Banner::select('image_eng as image')->where('active', 1)->get();
		}
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
		$categories = Category::all();
		$cs = CategoriesSpecialitiesView::orderBy('S_name')->get();
		return View::make('specialties', ['categories' => $categories,
											'cs' => $cs]);
	}

	public function speciality($s_id)
	{
		$speciality = CategoriesSpecialitiesView::wheres_id($s_id)->first();
		$business = BusinessAtributtesView::wheres_id($s_id)->orderBy('rating', 'desc')->orderBy('comments_count', 'desc')->take(5)->get();
		return View::make('speciality_profile', ['speciality' => $speciality,
													'business' => $business]);
	}

	public function category($c_id)
	{
		$category = Category::wherec_id($c_id)->first();
		$specialties = Specialty::wheres_id_category($c_id)->get();
		$business = BusinessAtributtesView::wherec_id($c_id)->orderBy('rating', 'desc')
		->orderBy('comments_count', 'desc')->groupBy('B_ID')->take(5)->get();
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
		return View::make('profile', ['user' => $user, 'location' => $location]);
	}

}
