<div class="box" id="edit-form">
    <div class="box-header">
        <h3 class="box-title">Edit Expense</h3>
    </div>
    <div class="box-body">
        {{ Form::model($expense, array('route' => array('finance.expense.update', $expense->id),'method' => 'put')) }}
            <div class="input-group">
                {{ Form::text('amount',null, array('id'=>'editamount','class'=>'form-control amount','placeholder'=>'Amount'));}}
                <span class="input-group-addon">K</span>
            </div>
            <br />
            {{ Form::select('category_id',$categories, $expense->category_id, array('class'=>'form-control'))  }}
            <br />
            <select name="payee_id" class="form-control">
reo
                <option value="">Select Payee</option>
                @foreach ($payee as $pe)
                <option value="{{ $pe->id }}" @if( $pe->id == $expense->payee_id )) selected="selected" @endif>{{ $pe->username }}</option>
                @endforeach
            </select>
            <div class="form-group">
                {{ Form::label('description') }}
                {{ Form::textarea('description',null, array('class'=>'form-control','rows'=>'3','placeholder'=>'Enter .... ') ) }}
            </div>
            <br />
            <input name="created_at" id="created_at" type="text" class="form-control" placeholder="Date" value="{{ $expense->created_at->toDateString() }}">
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