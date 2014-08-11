<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Incomes</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div id="incomepie" style="width:100%;height:150px">
        </div>
    </div><!-- /.box-body-->
</div>
@section('foot')
@parent
<!-- FLOT CHARTS -->
<script type="text/javascript">
    $(function() {
        var data = [
            @foreach($incomeCat as $c)
            { label: "{{$c->name}}",  data: {{$c->totalamount}}},
            @endforeach
            ];
        $.plot('#incomepie', data, {
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
