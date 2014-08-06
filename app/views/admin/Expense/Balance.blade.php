<div class="box box-primary">
    <div class="box-body">
        <div id="jmbalance">
            <ul>
                <li id="money_in" class="money"><span class="number">{{ number_format($totalIncomes,0,'','.') }} </span><span class="text">Money In</span></li>
                <li id="money_out"><span class="number">{{ number_format($totalExpenses,0,'','.') }} </span><span class="text">Money Out</span></li>
                <li><hr style="margin: 1px 0;"></li>
                <li id="savings" class="moneytotal"><span class="number">{{ number_format($totalIncomes-$totalExpenses,0,'','.') }}</span> <span class="text">Savings</span></li>

            </ul>
        </div>
    </div><!-- /.box-body-->
</div>