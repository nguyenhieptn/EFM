@extends('admin.backend_layout.layout')
@section('content')
<section class="content">
    <!-- MAILBOX BEGIN -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid">
                <div class="box-bsody">
                    <div class="row"> <!-- charts system -->
                        <div class="col-md-6">@include('admin.Expense.ExpenseChart')</div>
                        <div class="col-md-6">@include('admin.Expense.CategoriesChart')</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                              @include('admin.Expense.form')
                        </div><!-- /.col (LEFT) -->

                        <div class="col-md-9 col-sm-8">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Latest Expense list</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tbody><tr>
                                            <th width="80px">Date</th>
                                            <th>Description</th>
                                            <th width="40px">Category</th>
                                            <th>Amount</th>
                                        </tr>
                                        <?php $total=0; ?>
                                        @foreach($expenses as $i)
                                        <?php  $total = $total+$i->amount ?>
                                        <tr>
                                            <td>{{ date("d/m/Y",strtotime($i->created_at)) }}</td>
                                            <td>{{ $i->description }} </td>
                                            <td>{{ $i->name }}</td>
                                            <td width="20px" align="right">{{ number_format($i->amount,0,'','.') }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>Total:</td>
                                            <td> </td>
                                            <td></td>
                                            <td width="20px" align="right">{{ number_format($total,0,'','.')    }}</td>
                                        </tr>

                                        </tbody></table>
                                </div><!-- /.box-body -->
                            </div>
                        </div><!-- /.col (RIGHT) -->
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="pull-right">
                        <small>Showing 1-12/1,240</small>
                        <button class="btn btn-xs btn-primary"><i class="fa fa-caret-left"></i></button>
                        <button class="btn btn-xs btn-primary"><i class="fa fa-caret-right"></i></button>
                    </div>
                </div><!-- box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col (MAIN) -->
    </div>
    <!-- MAILBOX END -->

</section>
@stop
@section('foot')
@parent
<!-- FLOT CHARTS -->
{{ HTML::script('js/plugins/flot/jquery.flot.min.js')}}
{{ HTML::script('js/plugins/flot/jquery.flot.resize.min.js')}}
{{ HTML::script('js/plugins/flot/jquery.flot.pie.min.js')}}
{{ HTML::script('js/plugins/flot/jquery.flot.categories.min.js')}}
{{ HTML::script('js/plugins/flot/jquery.flot.barnumbers.js')}}

<script type="text/javascript">
    $(function() {
        /*
        * BAR CHART
        * ---------
        */

        var bar_data = [
                { data:[[20000, "Income"]], color:"blue" },
                { data:[[6000, "Expend"]], color:"red" }
        ];

        $.plot("#bar-chart", bar_data, {
            grid: {
                borderWidth: 1,
                borderColor: "#f3f3f3",
                tickColor: "#f3f3f3"
            },
            series: {
                bars: {
                    show: true,
                    barWidth: 0.5,
                    align: "center",
                    horizontal: true,
                    showNumbers: true
                }
            },
            yaxis: {
                mode: "categories",
                tickLength: 2,
                axisMargin: 10,
                autoscaleMargin: 0.05
            },
            xaxis: {
                autoscaleMargin:0.1,
                min: 0,
                ticks: 2
            },
            valueLabels: {
                show: true
            }
        });
    });

    /*
     * cat BAR CHART
     * ---------
     */

    var bar_data = {
        data: [["January", 10], ["February", 8], ["March", 4], ["April", 13], ["May", 17], ["June", 9]],
        color: "#3c8dbc"
    };
    $.plot("#cat-bar-chart", [bar_data], {
        grid: {
            borderWidth: 1,
            borderColor: "#f3f3f3",
            tickColor: "#f3f3f3"
        },
        series: {
            bars: {
                show: true,
                barWidth: 0.5,
                align: "center"
            }
        },
        xaxis: {
            mode: "categories",
            tickLength: 0
        }
    });
    /* END BAR CHART */

</script>
@stop
