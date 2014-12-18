@extends('layouts.layout')
@section('head')
@parent
<meta name="_token" content="{{ csrf_token() }}" xmlns="http://www.w3.org/1999/html"/>
{{ HTML::style('css/daterangepicker/daterangepicker-bs3.css') }}
@stop
@section('title',"Member section")
@section('pageheader',$user->first_name." ".$user->last_name)
@section('pageheader_small',$user->username)
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-success clearfix">
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt>Date</dt>
                        <dd>{{ $user->created_at }}</dd>
                        <dt>Manager</dt>
                        <dd>{{ $user->username }}</dd>
                        <dt>Customer</dt>
                        <dd>{{ $user->email }}</dd>
                        <dt>Status</dt>
                        <dd>{{ $user->status }}</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-success clearfix">
                <div class="box-body">
                    Mike Doe I would like to meet you to discuss the latest news about the arrival of the new theme. They say it is going to be one the best themes on the market
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-success clearfix">
                <div class="box-body">
                    Mike Doe I would like to meet you to discuss the latest news about the arrival of the new theme. They say it is going to be one the best themes on the market
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-xs-12" style="padding-top:20px">
                            {{ Form::open(array('url' => array('users/member/'.$user->id), 'method' => 'get')) }}
                            <div class="col-md-4 form-group">
                                <input  type="text" class="form-control input-sm" id="daterange"  name="date" placeholder="date" value="{{ Session::get('startDate') }} TO {{ Session::get('endDate') }}"/>
                            </div>
                            <div class="col-md-4 form-group">
                                <input  type="text" class="form-control input-sm"  name="search" placeholder="Search" value="{{ Input::get('search') }}"/>
                            </div>
                            <div class="col-md-4 text-right">
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
                            <th width="80px">Date</th>
                            <th>Name</th>
                            <th>Amount</th>
                        </tr>

                        @foreach($user->projects as $p)

                        <tr class="edit" id="row{{$p->id}}" style="cursor: pointer">
                            <td>{{ $p->created_at->format("d-m-Y") }}</td>
                            <td><a href="{{ URL::to("projects/".$p->id); }}">{{ $p->name }} </a></td>
                            <td width="20px" align="right">{{ number_format($p->milestones()->sum("amount"),0,'','.') }}</td>
                        </tr>
                        @endforeach


                        </tbody></table>
                </div><!-- /.box-body -->

            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="box box-success">
                <div class="box-header" style="cursor: move;">
                    <i class="fa fa-comments-o"></i>
                    <h3 class="box-title">Chat</h3>
                    <div title="" data-toggle="tooltip" class="box-tools pull-right" data-original-title="Status">
                        <div data-toggle="btn-toggle" class="btn-group">
                            <button class="btn btn-default btn-sm active" type="button"><i class="fa fa-square text-green"></i></button>
                            <button class="btn btn-default btn-sm" type="button"><i class="fa fa-square text-red"></i></button>
                        </div>
                    </div>
                </div>
                <div id="chat-box" class="box-body chat">
                    <!-- chat item -->
                    <div class="item">
                        <img class="offline" alt="user image" src="{{ URL::asset('img/avatar3.png') }}">
                        <p class="message">
                            <a class="name" href="#">
                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                                Jane Doe
                            </a>
                            I would like to meet you to discuss the latest news about
                            the arrival of the new theme. They say it is going to be one the
                            best themes on the market
                        </p>
                    </div><!-- /.item -->
                    <!-- chat item -->
                    <div class="item">
                        <img class="offline" alt="user image" src="{{ URL::asset('img/avatar3.png') }}">
                        <p class="message">
                            <a class="name" href="#">
                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                                Susan Doe
                            </a>
                            I would like to meet you to discuss the latest news about
                            the arrival of the new theme. They say it is going to be one the
                            best themes on the market
                        </p>
                    </div><!-- /.item -->
                </div><!-- /.chat -->
                <div class="box-footer">
                    <div class="input-group">
                        <input placeholder="Type message..." class="form-control">
                        <div class="input-group-btn">
                            <button class="btn btn-success"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.users.member.salaries')
    </div>
</section>
<section id="create-salary-view">
    @include("admin.salaries.create")
</section>
@stop
@section('footer')
@parent
{{ HTML::script('js/plugins/daterangepicker/daterangepicker.js')}}
<script type="text/javascript">
    $(function() {
        //add milestone trigger
        $("[id^='adm_']").click(function(){
            project_id = this.id.substring(4);
            $('#project_id').val(project_id);
        });

        //remove project trigger
        $("[id^='rmp_']").click(function(){
            project_id = this.id.substring(4);
            action = $('#rmProject').attr('action');
            pos = action.lastIndexOf("/");
            newAction = action.substr(0,pos)+"/"+project_id;
            //console.log(newAction);
            $('#rmProject').attr('action',newAction)
        });


        //Date range as a button
        $('#daterange').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1,'days'), moment().subtract(1,'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29,'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1,'month').startOf('month'), moment().subtract(1,'month').endOf('month')]
                },
                format: 'YYYY-MM-DD',
                separator: ' TO ',
                startDate: moment().subtract(29,'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#from').val(start.format('YYYY-MM-DD'));
                $('#to').val(end.format('YYYY-MM-DD'));
            }
        );
    });
</script>
@stop