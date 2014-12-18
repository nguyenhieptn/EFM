<?php
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class CategoryController extends \BaseController {
    /**
	 * Display a listing of the resource.
	 *
     *
	 * @return Response
	 */
	public function index($cattype = null)
	{
        $user = Sentry::getUser();
        if(!isset($cattype)){
            $cattype = Session::get('cattype');
        }else {
            Session::set('cattype',$cattype);
        }

		$categories = \Category::whereRaw('type = ?',array($cattype))->where('user_id','=',$user->id)->get();

        return \View::make('admin.Category.category',compact('categories'))->with('cattype',$cattype);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = \Input::all();
        $validation = \Validator::make($input, \Category::rules());

        if ($validation->passes())
        {
            \Category::create($input);

            return \Redirect::to('finance/category/'.$input['type']);
        }

        return \Redirect::back()
            ->withInput()
            ->with('message', 'danger|There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

        Category::find($id)->delete();

        return \Redirect::to('finance/category/'.Session::get('cattype'));
	}


}
