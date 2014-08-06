@extends('admin.backend_layout.layout')
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
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>
                        {{ $totalIncome }}<sup style="font-size: 20px">vnd</sup>
                    </h3>
                    <p>
                        Income
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a class="small-box-footer" href="#">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        {{ $totalIncome }}<sup style="font-size: 20px">vnd</sup>
                    </h3>
                    <p>
                        Expense
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a class="small-box-footer" href="#">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        {{ $totalIncome-$totalExpense }}<sup style="font-size: 20px">vnd</sup>
                    </h3>
                    <p>
                        Saving
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a class="small-box-footer" href="#">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        {{ $totalBudget }}<sup style="font-size: 20px">vnd</sup>
                    </h3>
                    <p>
                        Budget
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a class="small-box-footer" href="#">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@stop
@section('foot')
@parent
{{ HTML::script('js/plugins/flot/jquery.flot.min.js')}}
{{ HTML::script('js/plugins/flot/jquery.flot.resize.min.js')}}
{{ HTML::script('js/plugins/flot/jquery.flot.pie.min.js')}}
{{ HTML::script('js/plugins/flot/jquery.flot.categories.min.js')}}
@stop