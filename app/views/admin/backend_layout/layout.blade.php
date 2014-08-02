<!DOCTYPE html>
<html>
<head>
    @section('head')
    <!-- This is based header -->
    <meta charset="UTF-8">
    <title>{{ $title or ' TITLE '}}</title>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- END based head, need more add at child page by @parent-->
    @show
</head>
<body class="skin-blue">
<!-- header -->
{{ View::make('admin.backend_layout.header') }}

<div class="wrapper row-offcanvas row-offcanvas-left">
    <aside class="left-side sidebar-offcanvas">
        <!-- Left side column. contains the logo and sidebar -->
        {{ View::make('admin.backend_layout.left') }}
    </aside>
    <aside class="right-side">
        <!-- Right side column. Contains the navbar and content of the page -->
        <!-- Content Header (Page header) -->
        {{ View::make('admin.backend_layout.contentheader') }}

        <!-- Main content get from specific view -->
        @yield('content')
        <!-- /.content -->

    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

@section('foot')
<!-- START foot code -->
<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
{{ HTML::script('js/jquery-ui-1.10.3.min.js')}}
<!-- Bootstrap -->
{{ HTML::script('js/bootstrap.min.js')}}
<!-- AdminLTE App -->
{{ HTML::script('js/AdminLTE/app.js')}}
<!-- AdminLTE for demo purposes -->
{{ HTML::script('js/AdminLTE/demo.js')}}
<!-- END foot master code, add more use @parent at child page -->
@show
</body>
</html>