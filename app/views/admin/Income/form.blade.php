<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">New Income</h3>
    </div>
    <div class="box-body">
        {{ Form::open(array('url'=>'finance/income')) }}
        <div class="input-group">
            <input name="amount" id="amount" type="text" class="form-control currenc" placeholder="Amount" value="{{ Input::old('amount') }}">
            <span class="input-group-addon">K</span>
        </div>
        <br />
        <select name="category_id" class="form-control">

            <option style="display:none;" value="" disabled selected>Select Category</option>
            @foreach ($categories as $id=>$name)
            <option value="{{ $id }}" @if($id==Input::old("category_id")) selected="selected" @endif>{{ $name }}</option>
            @endforeach
        </select>
        <br />
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
        </div>
        <br />
        <input name="created_at" id="created_at" type="text" class="form-control" placeholder="Date" value="{{ Input::old('created_date') }}">
        <br />
        <div class="form-group">
            <button class="btn btn-success btn-lg">Submit Income</button>
        </div>
        {{ Form::hidden('user_id',Sentry::getUser()->id) }}
        {{ Form::token() }}
        {{ Form::close() }}
    </div><!-- /.box-body -->
</div>
@section('footer')
@parent
<!-- start maskinguser money decimal -->
<script type="text/javascript">
    $(document).ready(function(){
        $('input[name="created_at"]').daterangepicker(
            {
                startDate: moment().subtract(29,'days'),
                endDate: moment(),
                format: 'YYYY-MM-DD',
                singleDatePicker: true
            },

            function(start, end, label) {
            }
        );

    });

</script>
<!-- end mask -->
@stop