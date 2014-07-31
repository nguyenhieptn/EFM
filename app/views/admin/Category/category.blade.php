@extends('admin.backend_layout.layout')
@section('content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                @if ($categories->count())
                    Categories ( Cac nhom chi tieu)
                @else
                    No Category
                @endif
            </h3>
            <div class="box-tools">
                <div class="input-group">
                    <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                    <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div><!-- /.box-header -->
        @if ($categories->count())
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody><tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
                @foreach ($categories as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ date("d m Y",strtotime($c->created_at)) }}</td>
                    <td>{{ date("d m Y",strtotime($c->updated_at))  }}</td>
                </tr>
                @endforeach
            </tbody></table>
        </div><!-- /.box-body -->
        @endif
    </div><!-- /.box -->
</div>
@stop