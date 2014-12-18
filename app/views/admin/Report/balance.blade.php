<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-blue">
        <div class="inner">
            <h3>
                {{ number_format($totalIncome,0,'','.') }}<sup style="font-size: 20px">.000 vnd</sup>
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
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red">
        <div class="inner">
            <h3>
                {{ number_format($totalExpense,0,'','.') }}<sup style="font-size: 20px">.000 vnd</sup>
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
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
        <div class="inner">
            <h3>
                {{ number_format($totalIncome-$totalExpense,0,'','.') }}<sup style="font-size: 20px">.000 vnd</sup>
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
<div class="col-lg-3 col-xs-6">
    {{ Form::open(array('url'=>'finance/report','method'=>'get','id'=>'monthyear')) }}

    <div class="small-box bg-light-blue">

        <div class="inner" style="padding-bottom:0px;">

            <div class="form-group" style="margin-bottom: 12px;">
                {{ Form::selectRange('month',1,12,$month, array('class'=>'form-control')) }}
            </div>
            <div class="form-group" style="margin-bottom: 12px;">
                {{ Form::selectYear('year',date('Y')-5,date('Y')+5,$year, array('class'=>'form-control')) }}
            </div>

        </div>
        <a class="small-box-footer" href="#" id="submitMY">
           Change month <i class="fa fa-arrow-circle-right"></i>
        </a>

    </div>
    {{ Form::close() }}
</div>
@section('footer')
@parent
<script type="text/javascript">
    $('#submitMY').click(function(){
        $('form#monthyear').submit();
    });
</script>
@stop
