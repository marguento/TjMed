<?php

class HomeController extends BaseController {

	public function index()
	{
		//$business = Business::orderBy('b_joined_date','desc')->take(3)->get();
		$business = BusinessRatingView::take(3)->get();
		$comments = BusinessCommentsView::orderBy('C_datetime_created', 'desc')->take(3)->get();
		$cats 	  = BusinessCategoriesView::all();
		$articles = ArticleView::orderBy('A_created_at', 'desc')->take(3)->get();
		return View::make('index', ['articles' => $articles,
									'business' => $business,							
									'comments' => $comments,
									'cats'	   => $cats]);
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
		return View::make('articles', ['articles' => $articles]);
	}

	public function contact()
	{
		return View::make('contact');
	}

	public function specialties()
	{
		$categories = Category::all();
		$cs = CategoriesSpecialitiesView::all();
		return View::make('specialties', ['categories' => $categories,
											'cs' => $cs]);
	}

	public function speciality($s_id)
	{
		$speciality = CategoriesSpecialitiesView::wheres_id($s_id)->first();
		return View::make('speciality_profile', ['speciality' => $speciality]);
	}

	public function category($c_id)
	{
		$category = Category::wherec_id($c_id)->first();
		$specialties = Specialty::wheres_id_category($c_id)->get();
		return View::make('categorias', ['category' => $category,
											'specialties' => $specialties]);
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

		$reviews = UserReviewView::whereC_user(Auth::user()->U_username)->get();

		return View::make('user_profile', ['countries' => $countries, 'user_c' => $user_c,
		 									'reviews' => $reviews]);
	}

	public function register()
	{
		if (Auth::check())
		{
			return Redirect::to('/');
		}
		return View::make('registro');
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
		return View::make('profile', ['user' => $user]);
	}

}
