<div class="box box-danger">
    <div class="box-header">
        <h3 class="box-title">Expense</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div id="expensepie" style="width:100%;height:150px">
        </div>
    </div><!-- /.box-body-->
</div>
@section('foot')
@parent
<!-- FLOT CHARTS -->
<script type="text/javascript">
    $(function() {
        var data = [
            { label: "Series1",  data: 10},
            { label: "Series2",  data: 30},
            { label: "Series3",  data: 90},
            { label: "Series4",  data: 70},
            { label: "Series5",  data: 80},
            { label: "Series6",  data: 110}
        ];
        $.plot('#expensepie', data, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: false
                    }
                }
            },
            legend: {
                show: true
            }
        });
    });
</script>
@stop
