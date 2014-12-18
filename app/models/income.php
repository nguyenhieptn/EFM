<?php
class Income extends \Eloquent
{
    protected $table='incomes';
    protected $fillable = array('user_id','description','category_id','amount','created_at');

    public static function rules()
    {
        return  array(
            'user_id'    => 'Integer|required', // name of category
            'category_id'    => 'Integer|required', // name of category
            'amount'    => 'required', // name of category
        );
    }

    /*
     *Get all incomes in a date range of user_id
     * @param $startdate datetime
     * @param $endDate date
     * @parame $user int
     * @return incomes eloquent data
     */
    public static function getIncomeList($startDate,$endDate)
    {
        $incomes = \DB::table('incomes')
            ->join('categories', 'categories.id', '=', 'incomes.category_id')
            ->select('incomes.id',
                'incomes.created_at',
                'incomes.description',
                'incomes.amount',
                'categories.name')
            ->whereRaw("`incomes`.`created_at`>= '$startDate'
                    AND `incomes`.`created_at`<='$endDate'")
            ->orderBy('incomes.created_at','desc');

        //filter by category
        if(Input::has("category_id") && Input::get("category_id")!=0){
            $incomes->where('categories.id', '=', Input::get("category_id"));
        }

        return $incomes->get();
    }


     /*
     * Get total income amount in a range of a user_id
     * @user_id int
     * @param $startDate datetime
     * @param $endDate datetime
     * @return $total int
     */
    public static function getTotalAmount($startDate, $endDate){
        $incomes = \DB::table('incomes')
            ->join('users', 'users.id', '=', 'incomes.user_id')
            ->select('incomes.id',
                'incomes.created_at',
                'incomes.amount')
            ->whereRaw("`incomes`.`created_at`>= '$startDate'
                    AND `incomes`.`created_at`<='$endDate'")
            ->orderBy('incomes.created_at','desc')
            ->sum('incomes.amount');
        return $incomes;
    }

    /*
 * Get total expense group by months
 */
    public static function getTotalAmountByMonth($startDate, $endDate){
        $totalIncomeByMonths = \DB::table('incomes')
            ->select(DB::raw(
                    'YEAR(created_at) as year,'.
                    'MONTH(created_at) as month,'.
                    'sum(incomes.amount) as monthAmount')
            )
            ->whereRaw("`incomes`.`created_at`>= '$startDate'
                    AND `incomes`.`created_at`<='$endDate'")
            ->orderBy('incomes.created_at','asc')
            ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
            ->get();
        return $totalIncomeByMonths;
    }

    public function setAmountAttribute($value)
    {

        $this->attributes['amount'] = (int)str_replace('.','',$value);

    }
}
