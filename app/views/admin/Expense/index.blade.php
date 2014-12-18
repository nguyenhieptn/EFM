@extends('layouts.layout')
@section('head')
@parent
{{ HTML::style('css/daterangepicker/daterangepicker-bs3.css') }}
@stop
@section("title","Expense Management")
@section("pageheader","Expense Management")
@section('content')
<section class="content">
    <!-- MAILBOX BEGIN -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid">
                <div class="box-bsody">
                    <div class="row"> <!-- charts system -->
                        <div class="col-md-9 col-sm-8">@include('admin.Expense.ExpenseChart')</div>
                        <div class="col-md-3 col-sm-4">@include('admin.Expense.Balance')</div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                    <div class="row">
                                        <div class="col-xs-12" style="padding-top:20px">
                                            {{ Form::open(array('route' => array('finance.expense.index'), 'method' => 'get')) }}
                                            <div class="col-md-2 form-group">
                                                <select name="category_id" class="form-control">
                                                    <option value="0">All Cat</option>
                                                    @foreach ($categories as $id=>$name)
                                                    <option value="{{ $id }}" @if($id==Input::get("category_id")) selected="selected" @endif>{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input  type="text" class="form-control input-sm" id="daterange"  name="date" placeholder="date" value="{{ Input::get('date') }}"/>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input  type="text" class="form-control input-sm"  name="search" placeholder="Search" value="{{ Input::get('search') }}"/>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <button class="btn btn-default btn-sm">Apply</button>
                                            </div>

                                            <input  type="hidden" id="from" name="from"  value="{{ Session::get('startDate') }}" />
                                            <input  type="hidden" id="to" name="to"  value="{{ Session::get('endDate') }}"/>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tbody><tr>
                                            <th width="40px">Date</th>
                                            <th>Description</th>
                                            <th width="15%" class="hidden-xs hidden-sm">Category</th>
                                            <th>Amount</th>
                                        </tr>
                                        @foreach($expenses as $i)
                                        <tr class="edit" id="row{{$i->id}}" style="cursor: pointer">
                                            <td>{{ date("d/m",strtotime($i->created_at)) }}</td>
                                            <td >{{ $i->description }} </td>
                                            <td class="hidden-xs hidden-sm">{{ $i->name }}</td>
                                            <td width="20px" align="right">{{ number_format($i->amount,0,'','.') }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>Total:</td>
                                            <td> </td>
                                            <td class="hidden-xs hidden-sm"></td>
                                            <td align="right">{{ number_format($totalExpenses,0,'','.')    }}</td>
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
@section('footer')
@parent
{{ HTML::script('js/plugins/input-mask/jquery.inputmask.js') }}
{{ HTML::script('js/plugins/input-mask/jquery.inputmask.numeric.extensions.js') }}
{{ HTML::script('js/plugins/flot/jquery.flot.min.js')}}
{{ HTML::script('js/plugins/flot/jquery.flot.resize.min.js')}}
{{ HTML::script('js/plugins/flot/jquery.flot.categories.min.js')}}
{{ HTML::script('js/plugins/daterangepicker/daterangepicker.js')}}
<!-- POpup editor -->
<script type="text/javascript">
    $(function() {
        //var base_url = $(location).attr('href').replace("/expense","");
        base_url = '{{ URL::to("/") }}';

        $('.edit').click( function(){
            //This is id of the row
            var id = parseInt($(this).attr('id').substring(3));

            //ajax get edit form
            $.ajax({
                url: base_url+'/finance/expense/'+id+'/edit',
                type: "GET",
                success: function(result) {
                    //placing new form
                    $("#form-holder").html(result);

                    //trigger currency formater
                    $(".amount").inputmask("integer",{
                        groupSeparator: ".",
                        autoGroup: true,
                        prefix: '$'
                    });

                    //delete button
                    //TODO
                }
            });

            //moving browser view to the form
            $('html,body').animate({ scrollTop: $('#form-holder').offset().top }, 1000);
            //alert(id);
        });

        //DATE PICKER

        //Date range as a button
        //Date range as a button
        $('#daterange').daterangepicker(
            {
                ranges: {
                    'This Month': [moment().subtract(0,'month').startOf('month'), moment().subtract(0,'month').endOf('month')],
                    'Last Month': [moment().subtract(1,'month').startOf('month'), moment().subtract(1,'month').endOf('month')],
                    'Last 3 Month': [moment().subtract(3,'month').startOf('month'), moment().endOf('month')]
                },
                format: 'MM/DD/YYYY',
                separator: ' TO ',
                startDate: moment().subtract(29,'days'),
                endDate: moment(),
                singleDatePicker: false
            },
            function(start, end) {
                $('#from').val(start.format('MM/DD/YYYY'));
                $('#to').val(end.format('MM/DD/YYYY'));
            }
        );

    });
</script>
<!-- end Popup -->
@stop