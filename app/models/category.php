<?php
use Illuminate\Database\Eloquent;

class Category extends \Eloquent
{
    protected $table='categories';
    protected $fillable = array('name','type','user_id');
    public $timestamps = false;

    public static function rules()
    {
        return  array(
            'name'    => 'required', // name of category
            'type'    => 'Integer|required', // name of category
        );
    }

    public static function getExpenseCat($startDate,$endDate){
        $user = Sentry::getUser();
        $expenseCat = \DB::table('expenses')
            ->join('categories', 'categories.id', '=', 'expenses.category_id')
            ->select('expenses.id',
                'expenses.created_at',
                'expenses.description',
                DB::raw('sum(expenses.amount) AS totalamount'),
                'categories.name')
            ->where('expenses.user_id','=',$user->id)
            ->whereRaw("`expenses`.`created_at`> '$startDate'
                                    AND `expenses`.`created_at`<'$endDate'")
            ->orderBy('totalamount','desc')
            ->groupBy('expenses.category_id')
            ->get();

        return $expenseCat;
    }

    public static function getIncomeCat($startDate,$endDate){
        $incomeCat = \DB::table('incomes')
            ->join('categories', 'categories.id', '=', 'incomes.category_id')
            ->select('incomes.id',
                'incomes.created_at',
                'incomes.description',
                DB::raw('sum(incomes.amount) AS totalamount'),
                'categories.name')
            ->where('incomes.user_id','=',Sentry::getUser()->id)
            ->whereRaw("`incomes`.`created_at`> '$startDate'
                                    AND `incomes`.`created_at`<'$endDate'")
            ->orderBy('incomes.created_at','desc')
            ->groupBy('incomes.category_id')
            ->get();
        return $incomeCat;
    }

    public function  expenses()
    {
        return $this->hasMany('expenses');
    }

}
