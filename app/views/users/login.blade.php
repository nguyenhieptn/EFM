<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title>EXP Solution| Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    {{ HTML::style('css/bootstrap.min.css') }}
    <!-- font Awesome -->
    {{ HTML::style('css/font-awesome.min.css') }}
    <!-- Theme style -->
    {{ HTML::style('css/AdminLTE.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
 <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">EXP Enterprise</div>
            <!-- Main content get from specific view -->

            {{ Form::open(array('url'=>'actionlogin')) }}
                <div class="body bg-gray">
                    @if(Session::has('message'))
                    {{ Helper::displayAlert() }}
                    @endif
                    <div class="form-group">
                        {{ Form::text('username',Input::old('username'),array('class'=>'form-control','placeholder'=>'Username')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::password('password',array('class'=>'form-control','placeholder'=>'Password')) }}
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">
                    {{ Form::submit('Sign me in', array('class'=>'btn bg-olive btn-block')) }}

                    <p><a href="{{URL::to('dashboard')}}">I forgot my password</a></p>

                    <a href="{{URL::to('user/register')}}" class="text-center">Register a new account</a>
                </div>
            {{ Form::close() }}

            <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="{{ URL::asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

    </body>
</html>