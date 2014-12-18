@section("pageheader","Financial report for $month - $year")
@section("pagetitle","Financial report for $month - $year")
@extends('layouts.layout')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-4">
            @include('admin.Report.incomepie')
        </div>
        <div class="col-md-4">
            @include('admin.Report.expensepie')
        </div>
        <div class="col-md-4">
            @include('admin.Report.expensecattable')
        </div>
    </div>
    <!-- start row budget -->
    <div class="row">
            @include('admin.Report.balance')
    </div>
    <!-- /budget -->
    <div class="row">
        <div class="col-md-12">
            @include('admin.Report.tables')
        </div>
    </div>
    <!-- end Table -->
</section>
@stop
@section('footer')
@parent
{{ HTML::script('js/plugins/flot/jquery.flot.min.js')}}
{{ HTML::script('js/plugins/flot/jquery.flot.resize.min.js')}}
{{ HTML::script('js/plugins/flot/jquery.flot.pie.min.js')}}
{{ HTML::script('js/plugins/flot/jquery.flot.categories.min.js')}}
@stop