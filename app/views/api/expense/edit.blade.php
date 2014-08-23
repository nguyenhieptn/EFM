<div class="box box-info " id="edit-form">
    <div class="box-header">
        <h3 class="box-title">Edit Expense</h3>
        @if ($errors->any())
        <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </ul>
        @endif
    </div>
    <div class="box-body">
        {{ Form::model($expense, array('route' => array('expense.update', $expense->id),'method' => 'put')) }}
            <div class="input-group">
                {{ Form::text('amount',null, array('id'=>'editamount','class'=>'form-control amount','placeholder'=>'Amount'));}}
                <span class="input-group-addon">VND</span>
            </div>
            <br />
            {{ Form::select('category_id',$categories, $expense->category_id, array('class'=>'form-control'))  }}
            <br />
            {{ Form::select('account_id',$accounts, $expense->account_id, array('class'=>'form-control'))  }}
            <br />
            <div class="form-group">
                {{ Form::label('description') }}
                {{ Form::textarea('description',null, array('class'=>'form-control','rows'=>'3','placeholder'=>'Enter .... ') ) }}
            </div>

            <div class="form-group text-center">
                <a href="#" class="btn btn-danger btn-sm" id="btn-delete">Delete</a>
                <button class="btn btn-success btn-sm" id="btn-new">Add New</button>
                <button class="btn btn-success btn-sm" id="btn-update">Update this</button>
            </div>
        {{ Form::hidden('user_id',Auth::id()) }}
        {{ Form::token() }}
        {{ Form::close() }}

        {{ Form::hidden('user_id',Auth::id()) }}
        {{ Form::token() }}
        {{ Form::close() }}
    </div><!-- /.box-body -->
</div>