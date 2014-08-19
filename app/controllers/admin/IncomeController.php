<?php namespace controllers\admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use models\admin\Income;
use models\admin\Expense;
use Symfony\Component\Security\Core\Tests\Validator\Constraints\UserPasswordValidatorTest;

class IncomeController extends \BaseController {

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
        $categories = \User::find($id)->categories()->where('type','=','0')->get();

        //Prepare data for view
        $incomes = Income::getIncomeList($startDate,$endDate,$id);
        $totalExpenses = Expense::getTotalAmount($startDate,$endDate,$id);
        $totalIncome = Income::getTotalAmount($startDate,$endDate,$id);

        //render view
        return View::make('admin.Income.income')->with('accounts',$accounts)
            ->with('categories',$categories)
            ->with('incomes',$incomes)
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
        $validation = \Validator::make($input, Income::rules());

        if ($validation->passes())
        {
            Income::create($input);

            return \Redirect::to('income');
        }

        return \Redirect::route('income.index')
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
