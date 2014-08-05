<?php namespace controllers\admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use models\admin\Expense;
use models\admin\Income;
use Symfony\Component\Security\Core\Tests\Validator\Constraints\UserPasswordValidatorTest;

class ExpenseController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //INIT variables value
        //get current month
        $id = Auth::id();
        $month = \Input::get('month',date("m"));
        $year = \Input::get('year',date("Y"));

        $startDate = date("Y-m-d H:i:s",strtotime("$year-$month-01") );
        $endDate = date("Y-m-t H:i:s",strtotime("$year-$month-01") );

        $accounts = \User::find($id)->accounts()->get();
        $categories = \User::find($id)->categories()->where('type','=','1')->get();

        //get current records
        //$incomes = Income::with('categories','accounts')->get();
        $expenses = \DB::table('expenses')
                            ->join('categories', 'categories.id', '=', 'expenses.category_id')
                            ->join('accounts', 'accounts.id', '=', 'expenses.account_id')
                            ->select('expenses.id',
                                        'expenses.created_at',
                                        'expenses.description',
                                        'expenses.amount',
                                        'categories.name')
                            ->whereRaw("`expenses`.`created_at`> '$startDate' AND `expenses`.`created_at`<'$endDate'")
                            ->orderBy('expenses.created_at','desc')
                            ->get();
        $incomes = \DB::table('incomes')
                            ->join('categories', 'categories.id', '=', 'incomes.category_id')
                            ->join('accounts', 'accounts.id', '=', 'incomes.account_id')
                            ->select('incomes.id',
                                        'incomes.created_at',
                                        'incomes.description',
                                        'incomes.amount',
                                        'categories.name')
                            ->whereRaw("`incomes`.`created_at`> '$startDate' AND `incomes`.`created_at`<'$endDate'")
                            ->orderBy('incomes.created_at','desc')
                            ->sum('incomes.amount');
        //render view
        return View::make('admin.Expense.expense')->with('accounts',$accounts)
                                                ->with('categories',$categories)
                                                ->with('expenses',$expenses)
                                                ->with('incomes',$incomes)
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

            return \Redirect::to('admin/expense');
        }

        return \Redirect::route('admin.expense.index')
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
