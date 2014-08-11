<div class="box box-danger">
    <div class="box-header">
        <h3 class="box-title">Expense</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div id="expensepie" style="width:100%;height:150px">
        </div>
    </div><!-- /.box-body-->
</div>
<?php //var_dump($expenseCat); exit; ?>
@section('foot')
@parent
<!-- FLOT CHARTS -->
<script type="text/javascript">
    $(function() {
        var data = [
            @foreach($expenseCat as $c)
            { label: "{{$c->name}}",  data: {{$c->totalamount}}},
            @endforeach
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
