<div class="box box-danger">
    <div class="box-header">
        <h3 class="box-title">Expense by category</h3>
    </div><!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-condensed">
            <tbody><tr>

                <th>Category</th>
                <th class="text-right">Expense</th>
                <th style="width: 40px">Percent</th>
            </tr>
            @foreach($expenseCat as $c)
            <tr>
                <td>{{ $c->name }}</td>
                <td class="text-right">
                    {{ number_format($c->totalamount,0,'','.') }}
                </td>
                <td>
                        <span>{{ round(($c->totalamount/$totalExpense)*100) }}%</span>
                </td>
            </tr>
            @endforeach

            </tbody></table>
    </div><!-- /.box-body -->
</div>