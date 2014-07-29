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
@yield('content')
</html>