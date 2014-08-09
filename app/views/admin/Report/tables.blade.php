<div class="box">
    <div class="box-header">
        <h3 class="box-title">Chi tieu trong thang {{ $month }}/{{ $year }} </h3>
        <div class="box-tools">
            <div class="input-group">
                <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                <div class="input-group-btn">
                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tbody><tr>
                <th width="80px">Date</th>
                <th>Description</th>
                <th width="40px">Category</th>
                <th>Amount</th>
            </tr>
            @foreach($expenses as $i)
            <tr>
                <td>{{ date("d/m/Y",strtotime($i->created_at)) }}</td>
                <td>{{ $i->description }} </td>
                <td>{{ $i->name }}</td>
                <td width="20px" align="right">{{ number_format($i->amount,0,'','.') }}</td>
            </tr>
            @endforeach
            <tr>
                <td>Total:</td>
                <td> </td>
                <td></td>
                <td width="20px" align="right" id="totalExpense">{{ number_format($totalExpense,0,'','.')    }}</td>
            </tr>

            </tbody></table>
    </div><!-- /.box-body -->
</div>
</div><!-- /.col (RIGHT) -->
</div><!-- /.row -->
</div><!-- /.box-body -->