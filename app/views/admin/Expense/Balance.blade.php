<div class="box box-primary">
    <div class="box-body">
        <div id="jmbalance">
            <ul>
                <li id="money_in" class="money"><span>{{ number_format($totalIncomes,0,'','.') }} </span><span>Money In</span></li>
                <li id="money_out"><span>{{ number_format($totalExpenses,0,'','.') }} </span><span>Money Out</span></li>
                <li>---------------</li>
                <li id="savings" class="moneytotal"><span>{{ number_format($totalIncomes-$totalExpenses,0,'','.') }}</span> <span>Savings</span></li>

            </ul>
        </div>
    </div><!-- /.box-body-->
</div>