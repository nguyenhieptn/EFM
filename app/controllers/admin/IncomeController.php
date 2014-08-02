<?php namespace controllers\admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use models\admin\Income;
use Symfony\Component\Security\Core\Tests\Validator\Constraints\UserPasswordValidatorTest;

class IncomeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //get user id and cat acc
        $id = Auth::id();
        $accounts = \User::find($id)->accounts()->get();
        $categories = \User::find($id)->categories()->where('type','=','0')->get();

        //get current records
        //$incomes = Income::with('categories','accounts')->get();
        $incomes = \DB::table('incomes')
                            ->join('categories', 'categories.id', '=', 'incomes.category_id')
                            ->join('accounts', 'accounts.id', '=', 'incomes.account_id')
                            ->select('incomes.id',
                                        'incomes.created_at',
                                        'incomes.description',
                                        'incomes.amount',
                                        'categories.name')
                            ->orderBy('incomes.created_at')
                            ->get();

        //render view
        return View::make('admin.Income.income')->with('accounts',$accounts)
                                                ->with('categories',$categories)
                                                ->with('incomes',$incomes);
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
        $validation = \Validator::make($input, Income::rules());

        if ($validation->passes())
        {
            Income::create($input);

            return \Redirect::to('admin/income');
        }

        return \Redirect::route('admin.income.index')
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
		//
	}


}
