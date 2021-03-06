<div class="box">
    <div class="box-header">
        <h3>Latest 12 months Income/Expense analysis</h3>

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
<script type="text/javascript">
$(function() {
    /*
     * LINE CHART
     * ----------
     */
    //LINE randomly generated data
    var line_data1 = {
        data: {{ $totalExpensesByMonth }},
        color: "#f56954"
    };

    var line_data2 = {
        data: {{ $totalIncomesByMonth }},
        color: "#0073b7"
    };


    $.plot("#line-chart", [line_data1,line_data2], {
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

            $("#line-chart-tooltip").html("Month: "+ parseInt(x) + " = " + y)
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