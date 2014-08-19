@extends('admin.backend_layout.layout')
@section('content')
<section class="content">
<div class="row">
    <ul class="timeline">

        <!-- timeline time label -->
        <li class="time-label">
        <span class="bg-red">
            Let's Begin
        </span>
        </li>
        <!-- /.timeline-label -->

        <!-- timeline item -->
        <li>
            <!-- timeline icon -->
            <i class="fa fa-sign-out bg-blue"></i>
            <div class="timeline-item">
                <span class="time"><i class="fa fa-sign-out"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">Account initialize</a> ...</h3>

                <div class="timeline-body">
                    To setup your account, firstly you need to create all accounts that available for the finance management
                </div>

                <div class='timeline-footer'>
                    <a href="{{ URL::to('account') }}"class="btn btn-primary btn-xs">Account management</a>
                </div>
            </div>
        </li>
        <!-- END timeline item -->

        <!-- timeline item -->
        <li>
            <!-- timeline icon -->
            <i class="fa fa-bar-chart-o bg-blue"></i>
            <div class="timeline-item">
                <span class="time"><i class="fa fa-sign-out"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">Categories initialize</a> ...</h3>

                <div class="timeline-body">
                   Setup your income categories and expense categories so your money will be well organize
                </div>

                <div class='timeline-footer'>
                    <a href="{{ URL::to('category/1') }}"class="btn btn-primary btn-xs">Expense category</a>
                    <a href="{{ URL::to('category/0') }}"class="btn btn-primary btn-xs">Income category</a>
                </div>
            </div>
        </li>
        <!-- END timeline item -->

        <!-- timeline time label -->
        <li class="time-label">
        <span class="bg-green">
            Ready to use
        </span>
        </li>
        <!-- /.timeline-label -->

    </ul>

</div>
</section>
@stop
