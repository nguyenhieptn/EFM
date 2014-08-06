<div class="box box-primary">
    <div class="box-body">
        <div id="jmbalance">
            <ul>
                <li>{{ number_format($totalIncomes,0,'','.') }}</li>
                <li>{{ number_format($totalExpenses,0,'','.') }}</li>
                <li>---------------</li>
                <li>{{ number_format($totalIncomes-$totalExpenses,0,'','.') }}</li>

            </ul>
        </div>
    </div><!-- /.box-body-->
</div>