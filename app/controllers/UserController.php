<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function login()
	{
        if ( Sentry::check()) {
            return Redirect::route('dashboard');
        }else {
            return View::make("users.login");
        }
	}

    public function doLogin()
    {
		// validate the info, create rules for the inputs
        $rules = array(
            'username'    => 'required|alphaNum', // username
            'password' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->with('message','danger|'.$validator->errors()->first()) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            try{
                // create our user data for the authentication
                $userdata = array(
                    'username' 	=> Input::get('username'),
                    'password' 	=> Input::get('password')
                );

                // attempt to do the login
                $user = Sentry::authenticate($userdata, false);
                // validation successful!
            }
            catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
            {
                return Redirect::back()->with("message","danger|Username is requried")->withInput(Input::except('_token','password'));
            }
            catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
            {
                return Redirect::back()->with("message","danger|Password is requried")->withInput(Input::except('_token','password'));
            }
            catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
            {
                return Redirect::back()->with("message","danger|Wrong Password")->withInput(Input::except('_token','password'));
            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                return Redirect::back()->with("message","danger|User not found")->withInput(Input::except('_token','password'));
            }
            catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
            {
                return Redirect::back()->with("message","danger|User not activated")->withInput(Input::except('_token','password'));
            }

            return Redirect::intended('dashboard');
        }
    }

    public function index()
    {
        $filter = Session::get("filterState");
        //show only user in $group
        $group = Input::get("group");
        $users = User::with('groups')->byGroup($group)->paginate(10);

        //grouplist for listing on created
        $groups = Sentry::findAllGroups();
        $groupList = array();
        foreach($groups as $g){
            $groupList[$g->id] = $g->name;
        }
        //$group = Sentry::findGroupByName('admin');
        //$users = Sentry::findAllUsersInGroup($group);
        return View::make("admin.users.index")->with(compact('users','groupList'));
    }

    /*
     * show member as admin
     */
    public function showMember($user_id){
        //filtering
        if( Input::has("from") AND Input::has("to") ) {
            $startDate = date("Y-m-d 00:00:00",strtotime(Input::get("from")) );
            Session::set("startDate",$startDate);
            $endDate = date("Y-m-d 23:59:59",strtotime(Input::get("to")) );
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

        $f = \Carbon\Carbon::parse($startDate);
        $t = \Carbon\Carbon::parse($endDate);

        if(Sentry::getUser()->hasAccess("admin")){
            $user = User::with(['salaries',"projects"=> function($q) use($t,$f){
                    $q->where(DB::raw("DATE(projects.created_at)"),'<=',$t->toDateString());
                    $q->where(DB::raw("DATE(projects.created_at)"),'>=',$f->toDateString());
                }])->findOrFail($user_id);

            $salaries = array();
            foreach($user->salaries as $s){
                $salaries[] = [$s->created_at->timestamp*1000,$s->salary];
            }
            $salaries = json_encode($salaries);
            return View::make("admin.users.member.show")->with(compact('user','salaries'));
        }else {
            return View::make("dashboard")->with('message','danger|Permission denied');
        }
    }


	public function logout()
	{
        Sentry::logout();
        return Redirect::to('/login')->withErrors("Success logout");
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function store()
	{
        try
        {

            $user = Input::only('username','password','email','first_name','last_name');
            //created activated
            $user['activated'] = 1;

            // Create the user
            $user = Sentry::createUser($user);
            // Find the group using the group id
            $userGroup = Sentry::findGroupById(Input::get('group_id'));

            // Assign the group to the user
            $user->addGroup($userGroup);
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            return Redirect::back()->with("message","danger|Username is requried")->withInput(Input::except('_token','password'));
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            return Redirect::back()->with('message','danger|Password field is required.')->withInput(Input::except('_token','password'));
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e)
        {
            return Redirect::back()->with('message','danger|User with this login already exists.');
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            return Redirect::back()->with('message','danger|gen.Group was not found.');
        }

        return Redirect::to("users")->with('message','success|Success create user');
	}

	public function selfedit()
	{
        $user = Sentry::getUser();
        return View::make('users.edit', compact('user'));
	}

	public function selfUpdate()
	{
        $user = Sentry::getUser();
        $data = Input::except('_token','_method');
        //unset password if they do not want to change
        if ( !$data['password'] ) unset($data['password']);

        $user->fill($data);

        $valData = $user->toArray();
        $valData['password'] = isset($data['password'])?$data['password']:$user->password;
        $valData['password2'] = isset($data['password'])?$data['password2']:$user->password;

        $validator = Validator::make($valData, User::$rules);
        if ($validator->fails())
        {
            return Redirect::back()->with('message',"danger|".$validator->errors()->first())->withInput();
        }
        unset($user->password2);
        $user->save();

        return Redirect::back()->with('message',"success|Update success");
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        try
        {
            // Find the user using the user id
            $user = Sentry::findUserById($id);

            // Delete the user
            $user->delete();
            return Redirect::to("users")->withErrors("gen.Success delete");
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Redirect::to("users")->withErrors("gen.User was not found.");
        }
	}

}
