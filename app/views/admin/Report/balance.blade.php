<div class="col-md-3">
    <div class="small-box bg-blue">
        <div class="inner">
            <h3>
                {{ number_format($totalIncome,0,'','.') }}<sup style="font-size: 20px">vnd</sup>
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
                {{ number_format($totalExpense,0,'','.') }}<sup style="font-size: 20px">vnd</sup>
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
                {{ number_format($totalIncome-$totalExpense,0,'','.') }}<sup style="font-size: 20px">vnd</sup>
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
    {{ Form::open(array('url'=>'admin/report','method'=>'get','id'=>'monthyear')) }}
    <div class="small-box bg-light-blue">

        <div class="inner">

            <div class="form-group">
                {{ Form::selectRange('month',1,12,$month, array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::selectYear('year',date('Y')-5,date('Y')+5,$year, array('class'=>'form-control')) }}
            </div>

        </div>
        <a class="small-box-footer" href="#" id="submitMY">
           Change month <i class="fa fa-arrow-circle-right"></i>
        </a>

    </div>
    {{ Form::close() }}
</div>
@section('foot')
@parent
<script type="text/javascript">
    $('#submitMY').click(function(){
        $('form#monthyear').submit();
    });
</script>
@stop
