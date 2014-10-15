<?php

class HomeController extends BaseController {

	public function index()
	{
		$business = Business::take(3)->get();
		$comments = BusinessCommentsView::take(3)->get();
		$articles = Article::orderBy('A_created_at', 'desc')->take(3)->get();
		return View::make('index', ['articles' => $articles,
									'business' => $business,							
									'comments' => $comments]);
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
		return View::make('articles');
	}

	public function contact()
	{
		return View::make('contact');
	}

	public function specialties()
	{
		return View::make('specialties');
	}

	public function register()
	{
		return View::make('registro');
	}

}
