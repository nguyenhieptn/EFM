@extends('admin.backend_layout.layout')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @include('admin.ReportYear.line')
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
<script type="text/javascript">
$(function() {
    /*
     * LINE CHART
     * ----------
     */
    //LINE randomly generated data

    var sin = [], cos = [];
    for (var i = 0; i < 14; i += 0.5) {
        sin.push([i, Math.sin(i)]);
        cos.push([i, Math.cos(i)]);
    }
    var line_data1 = {
        data: sin,
        color: "red"
    };
    var line_data2 = {
        data: cos,
        color: "#00c0ef"
    };
    $.plot("#line-chart", [line_data1, line_data2], {
        grid: {
            hoverable: true,
            borderColor: "#f3f3f3",
            borderWidth: 1,
            tickColor: "#f3f3f3"
        },
        series: {
            shadowSize: 0,
            lines: {
                show: true
            },
            points: {
                show: true
            }
        },
        lines: {
            fill: false,
            color: ["#3c8dbc", "#f56954"]
        },
        yaxis: {
            show: true
        },
        xaxis: {
            show: true
        }
    });
});

    /* END LINE CHART */

</script>
@stop