<?php
namespace controllers\admin;

class AccountController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $accounts = \Account::whereRaw('user_id=?',array(\Auth::id()))->get();

        return \View::make('admin.Account.account',compact('accounts'));
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
        $validation = \Validator::make($input, \Account::rules());

        if ($validation->passes())
        {
            \Account::create($input);

            return \Redirect::to('account');
        }

        return \Redirect::route('admin.account.index')
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
        \Account::find($id)->delete();

        return \Redirect::to('account');
	}


}
