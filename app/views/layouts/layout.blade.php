<!DOCTYPE html>
<html>
<head>
    @section('head')
    <!-- This is based header -->
    <meta charset="UTF-8">
    <title>@yield("pageheader") EXP Solution</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    {{ HTML::style('css/bootstrap.min.css') }}
    <!-- font Awesome -->
    {{ HTML::style('css/font-awesome.min.css') }}
    <!-- Ionicons -->
    {{ HTML::style('css/ionicons.min.css') }}
    <!-- Theme style -->
    {{ HTML::style('css/AdminLTE.css') }}
    {{ HTML::style('css/admin.exp.css') }}

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- END based head, need more add at child page by @parent-->
    @show
</head>
<body class="skin-blue">
<!-- header -->
    @include('layouts.header')

<div class="wrapper row-offcanvas row-offcanvas-left">
    <aside class="left-side sidebar-offcanvas">
        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.left')
    </aside>
    <aside class="right-side">
        <!-- Right side column. Contains the navbar and content of the page -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield("pageheader")
                <small>@yield("pageheader_small")</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content get from specific view -->
        @if(Session::has('message'))
        <div class="row">
            <div class="col-md-12">
                {{ Helper::displayAlert() }}
            </div>
        </div>
        @endif

        @yield('content')
        <!-- /.content -->

    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

@section('footer')
<!-- START foot code -->
<!-- jQuery 2.0.2 -->
{{ HTML::script('js/jquery.min.2.0.2.js')}}
{{ HTML::script('js/jquery-ui-1.10.3.min.js')}}
{{ HTML::script('js/bootstrap.min.js')}}
{{ HTML::script('js/AdminLTE/app.js')}}
<!-- END foot master code, add more use @parent at child page -->
@show
</body>
</html>