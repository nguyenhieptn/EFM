<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $title or ' TITLE '}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    {{ HTML::style('css/bootstrap.min.css') }}
    <!-- font Awesome -->
    {{ HTML::style('css/font-awesome.min.css') }}
    <!-- Ionicons -->
    {{ HTML::style('css/ionicons.min.css') }}
    <!-- Morris chart -->
    {{ HTML::style('css/morris/morris.css') }}
    <!-- jvectormap -->
    {{ HTML::style('css/jvectormap/jquery-jvectormap-1.2.2.css') }}
    <!-- Date Picker -->
    {{ HTML::style('css/datepicker/datepicker3.css') }}
    <!-- Daterange picker -->
    {{ HTML::style('css/daterangepicker/daterangepicker-bs3.css') }}
    <!-- bootstrap wysihtml5 - text editor -->
    {{ HTML::style('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}
    <!-- Theme style -->
    {{ HTML::style('css/AdminLTE.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
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

<!-- add new calendar event modal -->


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
{{ HTML::script('js/jquery-ui-1.10.3.min.js')}}

<!-- Bootstrap -->
{{ HTML::script('js/bootstrap.min.js')}}
<!-- Morris.js charts -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
{{ HTML::script('js/plugins/morris/morris.min.js')}}

<!-- Sparkline -->
{{ HTML::script('js/plugins/sparkline/jquery.sparkline.min.js')}}

<!-- jvectormap -->
{{ HTML::script('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}
{{ HTML::script('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}
<!-- jQuery Knob Chart -->
{{ HTML::script('js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript')}}
<!-- daterangepicker -->
{{ HTML::script('js/plugins/daterangepicker/daterangepicker.js')}}
<!-- datepicker -->
{{ HTML::script('js/plugins/datepicker/bootstrap-datepicker.js')}}
<!-- Bootstrap WYSIHTML5 -->
{{ HTML::script('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}
<!-- iCheck -->
{{ HTML::script('js/plugins/iCheck/icheck.min.js')}}
<!-- AdminLTE App -->
{{ HTML::script('js/AdminLTE/app.js')}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{ HTML::script('js/AdminLTE/dashboard.js')}}
<!-- AdminLTE for demo purposes -->
{{ HTML::script('js/AdminLTE/demo.js')}}
</body>
</html>