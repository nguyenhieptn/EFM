<?php
namespace controllers\admin;
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
        if(!isset($cattype)){
            $cattype = Session::get('cattype');
        }else {
            Session::set('cattype',$cattype);
        }

		$categories = \Category::whereRaw('type = ? and user_id=?',array($cattype,\Auth::id()))->get();

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

            return \Redirect::to('category/'.$input['type']);
        }

        return \Redirect::route('admin.category.index')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

        return \Redirect::to('category/'.Session::get('cattype'));
	}


}
