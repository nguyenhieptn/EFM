<?php
namespace models\admin;

class Expense extends \Eloquent
{
    protected $table='expenses';
    protected $fillable = array('user_id','description','category_id','account_id','amount','payee_id');

    public static function rules()
    {
        return  array(
            'user_id'    => 'Integer|required',
            'category_id'    => 'Integer|required',
            'account_id'    => 'Integer|required',
            'amount'    => 'required',
            'payee_id'    => 'Integer',
        );
    }

    public static function getExpenseList($startDate,$endDate,$user_id)
    {
        $expenses = \DB::table('expenses')
            ->join('categories', 'categories.id', '=', 'expenses.category_id')
            ->join('accounts', 'accounts.id', '=', 'expenses.account_id')
            ->select('expenses.id',
                'expenses.created_at',
                'expenses.description',
                'expenses.amount',
                'categories.name')
            ->whereRaw("`expenses`.`created_at`> '$startDate'
                                    AND `expenses`.`created_at`<'$endDate'
                                    AND `expenses`.`user_id`='$user_id'")
            ->orderBy('expenses.created_at','desc')
            ->get();

        return $expenses;
    }

    /*
    * Get total expense amount in a range of a user id
    * @user_id int
    * @param $startDate datetime
    * @param $endDate datetime
    * @return $total int
    */
    public static function getTotalAmount($startDate, $endDate, $user_id){
        $totalExpense = \DB::table('expenses')
            ->select('expenses.id',
                'expenses.created_at',
                'expenses.amount')
            ->whereRaw("`expenses`.`created_at`> '$startDate'
                    AND `expenses`.`created_at`<'$endDate'
                    AND `expenses`.`user_id`='$user_id'")
            ->orderBy('expenses.created_at','desc')
            ->sum('expenses.amount');

        return $totalExpense;
    }

    public function setAmountAttribute($value)
    {

        $this->attributes['amount'] = (int)str_replace('.','',$value);

    }

    public function category()
    {
        return $this->belongsTo('category');
    }

    public function account()
    {
        return $this->belongsTo('account');
    }
}