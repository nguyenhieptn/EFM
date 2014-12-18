<?php
class Expense extends \Eloquent
{
    protected $table='expenses';
    protected $fillable = array('user_id','description','category_id','amount','payee_id','created_at');

    public static function rules()
    {
        return  array(
            'user_id'    => 'Integer|required',
            'category_id'    => 'Integer|required',
            'amount'    => 'required',
            'payee_id'    => 'Integer',
        );
    }

    public static function getExpenseList($startDate,$endDate)
    {
        $expenses = \DB::table('expenses')
            ->leftJoin('categories', 'categories.id', '=', 'expenses.category_id')
            ->leftJoin('users', 'users.id', '=', 'expenses.payee_id')
            ->select('expenses.id',
                'expenses.created_at',
                'users.username as payee',
                'expenses.description',
                'expenses.amount',
                'categories.name')
            ->whereRaw("`expenses`.`created_at`>= '$startDate'
                                    AND `expenses`.`created_at`<='$endDate'")
            ->orderBy('expenses.category_id')
            ->orderBy('expenses.created_at','desc');
                //filter by category
        if(Input::has("category_id") && Input::get("category_id")!=0){
            $expenses->where('categories.id', '=', Input::get("category_id"));
        }

        return $expenses->get();
    }

    /*
    * Get total expense amount in a range of a user id
    * @user_id int
    * @param $startDate datetime
    * @param $endDate datetime
    * @return $total int
    */
    public static function getTotalAmount($startDate, $endDate){
        $totalExpense = \DB::table('expenses')
            ->select('expenses.id',
                'expenses.created_at',
                'expenses.amount')
            ->whereRaw("`expenses`.`created_at`>= '$startDate'
                    AND `expenses`.`created_at`<='$endDate'")
            ->orderBy('expenses.created_at','desc')
            ->sum('expenses.amount');

        return $totalExpense;
    }

    /*
     * Get total expense group by months
     */
    public static function getTotalAmountByMonth($startDate, $endDate){
        $totalExpenseByMonths = \DB::table('expenses')
            ->select(DB::raw(
                'YEAR(created_at) as year,'.
                'MONTH(created_at) as month,'.
                'sum(expenses.amount) as monthAmount')
            )
            ->whereRaw("`expenses`.`created_at`>= '$startDate'
                    AND `expenses`.`created_at`<='$endDate'")
            ->orderBy('expenses.created_at','asc')
            ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
            ->get();
        return $totalExpenseByMonths;
    }

    public function setAmountAttribute($value)
    {

        $this->attributes['amount'] = (int)str_replace('.','',$value);

    }

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function payee(){
        return $this->belongsTo('User','payee_id','id','users');
    }
}
