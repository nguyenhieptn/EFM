<?php
class IncomeController extends \BaseController {

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
            return Response::make('Unauthorized', 401);
        }

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

        //@TODO adding search filter
        $categories = Category::where('type','=','0')->where('user_id','=',$user->id)->lists("name","id");

        //Prepare data for view
        $incomes = Income::getIncomeList($startDate,$endDate);
        $totalExpenses = Expense::getTotalAmount($startDate,$endDate);
        $totalIncome = Income::getTotalAmount($startDate,$endDate);

        //render view
        return View::make('admin.Income.income')
            ->with('categories',$categories)
            ->with('incomes',$incomes)
            ->with('totalIncomes',$totalIncome)
            ->with('totalExpenses',$totalExpenses);
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
        if(!Sentry::getUser()->hasAccess('member')){
            return Redirect::to('dashboard')->with('message','danger|NO access');
        }

		$input = \Input::only("category_id","user_id","amount","description",'created_at');
        $input['created_at'] = \Carbon\Carbon::parse($input['created_at'])->toDateString();

        $validation = \Validator::make($input, Income::rules());

        if ($validation->passes())
        {
            Income::create($input);

            return \Redirect::to('finance/income');
        }

        return \Redirect::route('finance.income.index')
            ->withInput()
            ->with('message', 'danger|'.$validation->errors()->first());
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        if(!Sentry::getUser()->hasAccess('member')){
            return Redirect::to('dashboard')->with('message','danger|NO access');
        }

        $categories = Category::where('type','=','0')->lists('name','id');
        $income = Income::find($id);

        return \View::make('admin.Income.edit')->with('categories',$categories)
            ->with('income',$income);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        if(!Sentry::getUser()->hasAccess('member')){
            return Redirect::to('dashboard')->with('message','danger|NO access');
        }

        $input = \Input::only("user_id","amount","category_id","description","delete","update",'created_at');
        $input['created_at'] = \Carbon\Carbon::parse($input['created_at'])->toDateString();
        //cmd delete
        if($input['delete']=='delete'){
            return $this->destroy($id);
        }

        $income = Income::findOrFail($id);

        $validator = Validator::make($input, Income::rules());

        if ($validator->fails())
        {
            return Redirect::back()->with("message","danger|".$validator->errors()->first())->withInput();
        }

        $income->update($input);

        return Redirect::back()->with("message","success|Update success");
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if(!Sentry::getUser()->hasAccess('member')){
            return Redirect::to('dashboard')->with('message','danger|NO access');
        }

        Income::destroy($id);

        return Redirect::back()->with('message','danger|Remove success');
	}


}
