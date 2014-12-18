<div class="box box-success">
    <div class="box-body clearfix">
    {{ Form::open(array('url'=>'finance/category')) }}
        <div class="form-group">
            <label class="control-label col-md-3 text-right" for="inputSuccess" >Submit new category:</label>
            {{ Form::text('name',Input::old('name'),array('class'=>'col-md-3 input-sm','placeholder'=>'Enter...','id'=>'inputSuccess')) }}
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary jm_submit">Submit</button>
        </div>
    {{ Form::hidden('type', $cattype ) }}
    {{ Form::hidden('user_id', Sentry::getUser()->id ) }}
    {{ Form::token() }}
    {{ Form::close() }}
    </div> <!-- /. box-body -->
</div>
