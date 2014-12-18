<div class="box">
    <div class="box-header">
        <h3 class="pull-left">Salaries history for {{ $user->username }}</h3>
        <a id="addSalary" data-toggle="modal" data-target="#createSalaryModal"  href="#" class="btn btn-default btn-sm pull-right" style="margin:20px 20px">Add New salary</a>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <div style="height: 300px; padding: 0px; position: relative;" id="line-chart"></div>
    </div><!-- /.box-body -->
</div>
</div><!-- /.col (RIGHT) -->
</div><!-- /.row -->
</div><!-- /.box-body -->
@section("footer")
@parent
{{ HTML::script('js/plugins/flot/jquery.flot.min.js')}}
{{ HTML::script('js/plugins/flot/jquery.flot.resize.min.js')}}
{{ HTML::script('js/plugins/flot/jquery.flot.time.js')}}
<script type="text/javascript">
    $(function() {

    var line_data1 = {
        data: {{ $salaries }},
        color: "#00a65a"
     };


    $.plot("#line-chart", [line_data1], {
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
            show:true,
            mode: "time",
            timeformat: "%m-%Y"
        }
    });

    //Initialize tooltip on hover
    $("<div class='tooltip-inner' id='line-chart-tooltip'></div>").css({
        position: "absolute",
        display: "none",
        opacity: 0.8
    }).appendTo("body");
    $("#line-chart").bind("plothover", function(event, pos, item) {

        if (item) {
            var x = item.datapoint[0].toFixed(2),
                y = item.datapoint[1].toFixed(2);

            $("#line-chart-tooltip").html(y)
                .css({top: item.pageY - 30, left: item.pageX - 30})
                .fadeIn(200);
        } else {
            $("#line-chart-tooltip").hide();
        }

    });
    /* END LINE CHART */
    });
</script>
@stop