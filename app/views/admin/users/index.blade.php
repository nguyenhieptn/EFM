@extends('layouts.layout')
@section('head')
@parent
@stop
@section("pageheader","Users Section")
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body clearfix">
                    {{ Form::open(array('route' => array('users.index'), 'method' => 'get')) }}
                    <div class="col-md-3 form-group">
                        <label for="status">Member Type:</label>
                        {{ Form::select('group', array('0' => 'All', 'member' => 'Members','customer'=>'Customer','manager'=>'manager','admin'=>'Admin'),Input::get('group'),['class'=>'form-control input-sm']);}}
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="search" >Keyword</label>
                        <input  type="text" class="form-control input-sm"  name="search" placeholder="Search" value="{{ Input::get('search') }}"/>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-default btn-sm" style="margin-top:24px;">Apply</button>
                    </div>
                    <div class="col-md-4 pull-right">
                        <div class="pull-left">
                            <a data-toggle="modal" data-target="#myModal"  class="btn btn-success" style="margin-top:24px;"> Create new User</a>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>username</th>
                            <th>email</th>
                            <th width="116px" class="text-right">State</th>
                        </tr>
                        @foreach($users as $u)
                        <tr>
                            <td>{{ $u->id }}</td>
                            <td><a href="{{ URL::to("users/member/$u->id") }}">{{ $u->first_name }} {{ $u->last_name }}</a></td>
                            <td>{{ $u->username }}</td>
                            <td>{{ $u->email }}</td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-success" type="button">Activated</button>
                                    <button data-toggle="dropdown" class="btn btn-sm btn-success dropdown-toggle" type="button">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>

                                    <ul role="menu" class="dropdown-menu" style="left: -40px;">
                                        <li><a id="rmu_{{ $u->id }}" data-toggle="modal" data-target="#rmUserModal"  href="#">Remove</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{ URL::to("Users/$u->id/status/1") }}">Other menu</a></li>

                                    </ul>
                                </div>
                            </td>

                        </tr>
                        @endforeach
                        </tbody></table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">

                    <div class="pull-right">
                        {{ $users->links() }}
                    </div>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
</section>
<section id="create-User-view">
    @include("admin.users.create")
</section>
<section id="remove-User-view">
    @include("admin.users.remove")
</section>
@stop
@section('footer')
@parent
<script type="text/javascript">
    $(function() {
        //remove project trigger
        $("[id^='rmu_']").click(function(){
            project_id = this.id.substring(4);
            action = $('#rmUser').attr('action');
            pos = action.lastIndexOf("/");
            newAction = action.substr(0,pos)+"/"+project_id;
            //console.log(newAction);
            $('#rmUser').attr('action',newAction)
        });
    });
</script>
@stop
