@extends('admin.backend_layout.layout')
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
                        <div class="col-md-3 col-sm-4" id="form-holder">
                              @include('admin.Expense.form')
                        </div><!-- /.col (LEFT) -->

                        <div class="col-md-9 col-sm-8">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Chi tieu trong thang {{ $month }}/{{ $year }} </h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
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
                                        <tr class="edit" id="row{{$i->id}}">
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
<section>
    <div id="dialog-form" title="Editor box">
    </div><!-- /.box-body -->

</section>
@stop
@section('foot')
@parent
{{ HTML::script('js/plugins/input-mask/jquery.inputmask.js') }}
{{ HTML::script('js/plugins/input-mask/jquery.inputmask.numeric.extensions.js') }}
{{ HTML::script('js/plugins/flot/jquery.flot.min.js')}}
{{ HTML::script('js/plugins/flot/jquery.flot.resize.min.js')}}
{{ HTML::script('js/plugins/flot/jquery.flot.categories.min.js')}}
<!-- POpup editor -->
<script type="text/javascript">
    $(function() {
        var base_url="http://localhost/EFM/public_html";

        $('.edit').click( function(){
            //This is id of the row
            var id = parseInt($(this).attr('id').substring(3));

            //ajax get edit form
            $.ajax({
                url: base_url+'/api/expense/'+id+'/edit',
                type: "GET",
                data: {
                    "eid": id
                },
                success: function(result) {
                    // Instead of calling the div name, I need to be able to target it with $(this) and .parent() to make sure only 1 video change, but for now I only want the response to replace the video
                    $("#form-holder").html(result);
                    $(".amount").inputmask("integer",{
                        groupSeparator: ".",
                        autoGroup: true,
                        prefix: '$'
                    });
                }
            });

            //moving browser view to the form
            $('html,body').animate({ scrollTop: $('#form-holder').offset().top }, 1000);
            //alert(id);
        });

    });
</script>
<!-- end Popup -->
@stop