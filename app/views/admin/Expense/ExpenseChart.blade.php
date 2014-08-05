<div class="box box-primary">
    <div class="box-body">
        <div id="bar-chart" style="width:100%;height:75px">
        </div>
    </div><!-- /.box-body-->
</div>
@section('foot')
@parent
<!-- FLOT CHARTS -->

<script type="text/javascript">
    $(function() {
        /*
         * BAR CHART
         * ---------
         */

        var bar_data = [
            { data:[[19800, "Income"]], color:"#eb3d3d" },
            { data:[[6000, "Expend"]], color:"#2ca9f2" }
        ];

        $.plot("#bar-chart", bar_data, {
            grid: {
                borderWidth: 0.5,
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
                axisMargin: 0,
                autoscaleMargin: 0.08
            },
            xaxis: {
                autoscaleMargin:0.02,
                min: 0,
                ticks: 5
            },
            valueLabels: {
                show: true
            }
        });
    });

</script>
@stop
