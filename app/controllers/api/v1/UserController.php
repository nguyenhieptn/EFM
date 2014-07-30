<?php namespace controllers\api\v1;

use Illuminate\Support\Facades\Response;
use Illuminate\Routing\Controllers\Controller;


class UserController extends Controller {

    public function login()
    {
        $rt =  array("1"=>"a");
        return Response::json($rt);
        //return Response::json(array('status' => 'success', 'data' => $pages->toArray()));
    }
}