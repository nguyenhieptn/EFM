<div class="box box-warning">
    <div class="box-header">
        <h3 class="box-title">Insert new Category</h3>
        @if ($errors->any())
            <ul>
                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
            </ul>
        @endif
    </div><!-- /.box-header -->
    <div class="box-body row-fluid">
    {{ Form::open(array('url'=>'admin/category')) }}
        <div class="col-md-6">
            <div class="form-group has-success">
                <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i>Category Name</label>
                {{ Form::text('name',Input::old('name'),array('class'=>'form-control','placeholder'=>'Enter...','id'=>'inputSuccess')) }}
            </div>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary jm_submit">Submit</button>
        </div>
    {{ Form::hidden('type', $cattype ) }}
    {{ Form::hidden('user_id', Auth::id() ) }}
    {{ Form::token() }}
    {{ Form::close() }}
    </div> <!-- /. box-body -->
</div>
