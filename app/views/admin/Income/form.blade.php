<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">New Income</h3>
        @if ($errors->any())
        <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </ul>
        @endif
    </div>
    <div class="box-body">
        {{ Form::open(array('url'=>'income')) }}
        <div class="input-group">
            <input name="amount" id="amount" type="text" class="form-control currenc" placeholder="Amount" value="{{ Input::old('amount') }}">
            <span class="input-group-addon">VND</span>
        </div>
        <br />
        <select name="category_id" class="form-control">

            <option style="display:none;" value="" disabled selected>Select Category</option>
            @foreach ($categories as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
        <br />
        <select name="account_id" class="form-control">
            <option style="display:none;" value="" disabled selected>Select Account</option>
            @foreach ($accounts as $a)
            <option value="{{ $a->id }}">{{ $a->name }}</option>
            @endforeach
        </select>
        <br />
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
        </div>
        <br />
        <div class="form-group">
            <button class="btn btn-success btn-lg">Submit Income</button>
        </div>
        {{ Form::hidden('user_id',Auth::id()) }}
        {{ Form::token() }}
        {{ Form::close() }}
    </div><!-- /.box-body -->
</div>
@section('foot')
@parent
<!-- start maskinguser money decimal -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#amount").inputmask("decimal",{
            radixPoint:",",
            groupSeparator: ".",
            digits: 0,
            autoGroup: true,
            prefix: '$'
        });
    });
</script>
<!-- end mask -->
@stop
