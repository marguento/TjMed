<?php

class ArticleController extends BaseController {

	public function show($a_id) 
	{
		$article = ArticleView::wherea_id($a_id)->first();
		$comments = ArticleCommentsView::wherea_id($a_id)->orderBy('C_datetime_created', 'desc')->paginate(5);
		$categories = ArticleCategoriesView::wherea_id($a_id)->get();
		$tags = ArticleTagsView::wherea_id($a_id)->get();

		return View::make('article_profile', ['article' => $article, 
												'comments' => $comments,
												'categories' => $categories,
												'tags' => $tags]);
	}

	public function add_review() 
	{
		$data = Input::all();
		$comment 					 = new Comment();
		$comment->C_user 			 = Auth::user()->U_username;
		$comment->C_content 		 = $data['content'];
		$comment->C_datetime_created = date('Y-m-d H:i:s');
		$comment->C_rating 			 = $data['rating'];
		$comment->save();

		$id_c = $comment->C_ID;
		$bhc 			  = new ArticleHasComments();
		$bhc->AHC_ID = null;
		$bhc->AHC_article = $data['curr_article'];
		$bhc->AHC_comment  = $id_c;

		$bhc->save();

		Comment::where('C_user', Auth::user()->U_username)
			->whereIn('C_ID', function($query) use ($data) {
			    $query->select('AHC_comment')
			    ->from(with(new ArticleHasComments)->getTable())
			    ->where('AHC_article', $data['curr_article']);
		})->update(array('C_rating' => $data['rating']));

		return Redirect::to('articulo/' . $data['curr_article'] . '#comments');
	}

}