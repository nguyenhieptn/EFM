<?php namespace controllers\admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

    public function login()
    {
        return \View::make('admin.user.login');
    }

    /*
     * logout user and redirect them to login page
     */
    public function logout()
    {
        Auth::logout();
        return \View::make('admin.user.login');
    }

    /*
     * Process validate login form data
     * Return to form if invalid
     * move to dashboard if valid
     */
    public function actionlogin()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'username'    => 'required|alphaNum', // username
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = \Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('user/login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'username' 	=> Input::get('username'),
                'password' 	=> Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {
                // validation successful!
                return Redirect::to('admin/dashboard');
            } else {

                // validation not successful, send back to form
                return Redirect::to('user/login')->withInput(Input::except('password'));;

            }

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return \View::make("admin.user.register");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = \Input::all();
        $validation = \Validator::make($input, \User::rules());

        if ($validation->passes())
        {
            \User::create($input);
            $userdata = array(
                'username' 	=> Input::get('username'),
                'password' 	=> Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {
                // validation successful!
                return Redirect::to('admin/dashboard');
            }
        }

        return \Redirect::to('user/register')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }



}
