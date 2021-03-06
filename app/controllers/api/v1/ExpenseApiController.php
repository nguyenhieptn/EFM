<?php namespace controllers\api\v1;

use Illuminate\View\View;
use models\admin\Expense;
use models\admin\Income;

class ExpenseApiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //INIT variables value
        $id = Auth::id();
        $month = \Input::get('month',date("m"));
        $year = \Input::get('year',date("Y"));

        $startDate = date("Y-m-d H:i:s",strtotime("$year-$month-01") );
        $endDate = date("Y-m-t H:i:s",strtotime("$year-$month-01") );

        $accounts = \User::find($id)->accounts()->get();
        $categories = \User::find($id)->categories()->where('type','=','1')->get();

        //Prepare data for view
        $expenses = Expense::getExpenseList($startDate,$endDate,$id);
        $totalExpenses = Expense::getTotalAmount($startDate,$endDate,$id);
        $totalIncome = Income::getTotalAmount($startDate,$endDate,$id);

        //render view
        return View::make('admin.Expense.expense')->with('accounts',$accounts)
                                                ->with('categories',$categories)
                                                ->with('expenses',$expenses)
                                                ->with('totalIncomes',$totalIncome)
                                                ->with('totalExpenses',$totalExpenses)
                                                ->with('month',$month)
                                                ->with('year',$year);
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
        $validation = \Validator::make($input, Expense::rules());

        if ($validation->passes())
        {
            Expense::create($input);

            return \Redirect::to('expense');
        }

        return \Redirect::route('expense.index')
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
	public function edit($eid)
	{
        $id = \Auth::id();
        $month = \Input::get('month',date("m"));
        $year = \Input::get('year',date("Y"));

        $startDate = date("Y-m-d H:i:s",strtotime("$year-$month-01") );
        $endDate = date("Y-m-t H:i:s",strtotime("$year-$month-01") );

        $accounts = \User::find($id)->accounts()->lists('name','id');
        $categories = \User::find($id)->categories()->where('type','=','1')->lists('name','id');


        $expense = Expense::find($eid);


        //var_dump($expense->category->name); exit;

        return \View::make('api.expense.edit')->with('categories',$categories)
                                              ->with('expense',$expense)
                                              ->with('accounts',$accounts);
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
