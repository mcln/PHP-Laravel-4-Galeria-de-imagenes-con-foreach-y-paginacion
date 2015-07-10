<?php
class IndexController extends BaseController {
public function index()
	{
		
		/* envia las imagen random desde la base de datos hacia el index */
		
		$posts = Post::whereStatus(1)
			->orderBy(DB::raw("RAND()"), "desc");

			if(Input::get("buscar", "") != ""):
			$posts = $posts->where(function($query){
			$query->where('title', 'LIKE', '%' . Input::get('buscar') . '%')
			->orWhere('content', 'LIKE', '%' . Input::get('buscar') . '%');
			});
			endif;

			$posts = $posts->paginate(9);

		return View::make('index', array("posts"=>$posts));

	}