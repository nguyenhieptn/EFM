<?php namespace controllers\admin;

use Illuminate\Support\Facades\View;

class CategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.Category.categories');
	}

}
