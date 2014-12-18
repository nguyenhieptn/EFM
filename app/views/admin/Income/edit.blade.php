<div class="box" id="edit-form">
    <div class="box-header">
        <h3 class="box-title">Edit Income</h3>
    </div>
    <div class="box-body">
        {{ Form::model($income, array('route' => array('finance.income.update', $income->id),'method' => 'put')) }}
        <div class="input-group">
            {{ Form::text('amount',$income->amount, array('id'=>'editamount','class'=>'form-control amount','placeholder'=>'Amount'));}}
            <span class="input-group-addon">K</span>
        </div>
        <br />
        {{ Form::select('category_id',$categories, $income->category_id, array('class'=>'form-control'))  }}
        <br />
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::textarea('description',$income->description, array('class'=>'form-control','rows'=>'3','placeholder'=>'Enter .... ') ) }}
        </div>
        <input name="created_at" id="created_at" type="text" class="form-control" placeholder="Date" value="{{ $income->created_at->toDateString() }}">
        <br />
        <div class="form-group text-center">
            <button type="submit" class="btn btn-danger btn-sm" id="btn-delete" name="delete" value="delete">Delete</button>
            <button class="btn btn-success btn-sm" id="btn-new">Add New</button>
            <button type="submit" class="btn btn-success btn-sm" id="btn-update" name="update" value="update">Update this</button>
        </div>
        {{ Form::hidden('user_id',Sentry::getUser()->id) }}
        {{ Form::token() }}
        {{ Form::close() }}
    </div><!-- /.box-body -->
</div>