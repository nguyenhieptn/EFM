<?php namespace controllers\admin;
use models\admin\Expense;
use models\admin\Income;

class ReportController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //INIT variables value
        $id = \Auth::id();
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
        $totalBudget = 7000;
        //render view
        return \View::make('admin.Report.month')->with('accounts',$accounts)
            ->with('categories',$categories)
            ->with('expenses',$expenses)
            ->with('totalIncome',$totalIncome)
            ->with('totalExpense',$totalExpenses)
            ->with('totalBudget',$totalBudget)
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
		//
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
