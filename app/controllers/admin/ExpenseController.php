<?php
class ExpenseController extends \BaseController {

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
        //filtering
        if( Input::has("date") ) {
            $date = explode(' TO ',Input::get("date"));
            $startDate = date("Y-m-d 00:00:00",strtotime($date[0]));
            Session::set("startDate",$startDate);
            $endDate = date("Y-m-d 23:59:59",strtotime($date[1]) );
            Session::set("endDate",$endDate);
        }else{
            if(Session::has("startDate") && Session::has("endDate")){
                $startDate = Session::get("startDate");
                $endDate = Session::get("endDate");
            }else{
                $startDate = date("Y-m-01 00:00:00");
                $endDate = date("Y-m-t 23:59:59");
            }
        }

        $categories = Category::where('type','=','1')->where('user_id','=',$user->id)->lists("name","id");

        //Prepare data for view
        $expenses = Expense::getExpenseList($startDate,$endDate);
        $totalExpenses = Expense::getTotalAmount($startDate,$endDate);
        $totalIncome = Income::getTotalAmount($startDate,$endDate);
        //$sentry = \Cartalyst\Sentry\Facades\CI\Sentry::createSentry();
        $payee = Sentry::findAllUsersWithAnyAccess(['admin','member','manager']);

        //render view
        return View::make('admin.Expense.expense')->with('categories',$categories)
                                                ->with('expenses',$expenses)
                                                ->with('totalIncomes',$totalIncome)
                                                ->with('totalExpenses',$totalExpenses)
                                                ->with('payee',$payee);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $user = Sentry::getUser();
        if(!$user->hasAccess('member')){
            return Redirect::to('dashboard')->with('message','danger|NO access');
        }
		$input = \Input::all();
        $input['created_at'] = \Carbon\Carbon::parse($input['created_at'])->toDateTimeString();
        $validation = \Validator::make($input, Expense::rules());


        if ($validation->passes())
        {
            $expense = Expense::create($input);

            return \Redirect::to('finance/expense')->with('message', "success|Success added expenses");;
        }

        return \Redirect::route('finance.expense.index')
            ->withInput()
            ->with('message', "danger|".$validation->errors()->first());
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

        $categories = Category::where('type','=','1')->lists('name','id');
        $expense = Expense::find($id);
        $payee = Sentry::findAllUsersWithAnyAccess(['admin','member','manager']);

        return \View::make('admin.Expense.edit')->with('categories',$categories)
            ->with("payee",$payee)
            ->with('expense',$expense);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($eid)
	{
        $user = Sentry::getUser();
        if(!$user->hasAccess('member')){
            return Redirect::to('dashboard')->with('message','danger|NO access');
        }

        $input = \Input::only("user_id","amount","category_id","payee_id","description","delete","update",'created_at');
        $input['created_at'] = \Carbon\Carbon::parse($input['created_at'])->toDateTimeString();

        //cmd delete
        if($input['delete']=='delete'){
            return $this->destroy($eid);
        }

        //cmd update
        $validation = \Validator::make($input, Expense::rules());

        if ($validation->passes())
        {
            $expense = Expense::find($eid);
            $expense->fill($input);
            $expense->save();
            return \Redirect::to('finance/expense')->with("message|Updated success.");
        }else {
            return \Redirect::route('finance.expense.index')
                ->withInput()
                ->with('message', 'danger|'.$validation->errors()->first());
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $user = Sentry::getUser();
        if(!$user->hasAccess('member')){
            return Redirect::to('dashboard')->with('message','danger|NO access');
        }
        Expense::destroy($id);

        return Redirect::back()->with('message','danger|Remove success');
	}


}
