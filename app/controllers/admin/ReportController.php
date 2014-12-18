<?php
class ReportController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $user = Sentry::getUser();
        //access filter
        if(!$user->hasAccess('member')){
            return Redirect::to("dashboard")->with('message','danger|permission Denied!');
        }

        //INIT variables value
        $month = \Input::get('month',date("m"));
        $year = \Input::get('year',date("Y"));

        $startDate = date("Y-m-d 00:00:00",strtotime("$year-$month-01") );
        $endDate = date("Y-m-t 23:59:59",strtotime("$year-$month-01") );

        $categories = Category::where('type','=','1')->get();

        $expenseCategories = Category::getExpenseCat($startDate,$endDate);
        $incomeCategories = Category::getIncomeCat($startDate,$endDate);

        //Prepare data for view
        $expenses = Expense::getExpenseList($startDate,$endDate);
        $totalExpenses = Expense::getTotalAmount($startDate,$endDate);
        $totalIncome = Income::getTotalAmount($startDate,$endDate);
        $totalBudget = 7000;

        $totalExpensesByMonth = Expense::getTotalAmountByMonth(date("Y-m-d H:i:s", strtotime("-12 months")),date("Y-m-d H:i:s"));
        $totalIncomesByMonth = Income::getTotalAmountByMonth(date("Y-m-d H:i:s", strtotime("-12 months")),date("Y-m-d H:i:s"));

        $data = array();
        $data2 = array();
        foreach($totalExpensesByMonth as $em){
            $data[]= [$em->month,(int)$em->monthAmount];
        }
        foreach($totalIncomesByMonth as $em){
            $data2[]= [$em->month,(int)$em->monthAmount];
        }
        $totalExpensesByMonth = json_encode($data);
        $totalIncomesByMonth = json_encode($data2);


        //get expends group by categories


        //render view
        return \View::make('admin.Report.finance')
            ->with('categories',$categories)
            ->with('expenses',$expenses)
            ->with('totalIncome',$totalIncome)
            ->with('totalExpense',$totalExpenses)
            ->with('totalBudget',$totalBudget)
            ->with('expenseCat',$expenseCategories)
            ->with('incomeCat',$incomeCategories)
            ->with('totalExpensesByMonth',$totalExpensesByMonth)
            ->with('totalIncomesByMonth',$totalIncomesByMonth)
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
