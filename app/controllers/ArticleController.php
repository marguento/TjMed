<?php

class ArticleController extends BaseController {

	public function show($a_id) 
	{
		$article = Article::wherea_id($a_id)->first();
		$comments = ArticleCommentsView::wherea_id($a_id)->get();

		return View::make('article_profile', ['article' => $article, 
												'comments' => $comments]);
	}

}