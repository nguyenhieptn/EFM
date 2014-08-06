<?php
namespace models\admin;

class Income extends \Eloquent
{
    protected $table='incomes';
    protected $fillable = array('user_id','description','category_id','account_id','amount');

    public static function rules()
    {
        return  array(
            'user_id'    => 'Integer|required', // name of category
            'category_id'    => 'Integer|required', // name of category
            'account_id'    => 'Integer|required', // name of category
            'amount'    => 'Integer|required', // name of category
        );
    }

    /*
     *Get all incomes in a date range of user_id
     * @param $startdate datetime
     * @param $endDate date
     * @parame $user int
     * @return incomes eloquent data
     */
    public static function getIncomeList($startDate,$endDate,$user_id)
    {
        $incomes = \DB::table('incomes')
            ->join('categories', 'categories.id', '=', 'incomes.category_id')
            ->join('accounts', 'accounts.id', '=', 'incomes.account_id')
            ->select('incomes.id',
                'incomes.created_at',
                'incomes.description',
                'incomes.amount',
                'categories.name')
            ->whereRaw("`incomes`.`created_at`> '$startDate'
                                    AND `incomes`.`created_at`<'$endDate'
                                    AND `incomes`.`user_id`='$user_id'")
            ->orderBy('incomes.created_at','desc')
            ->get();

        return $incomes;
    }


     /*
     * Get total income amount in a range of a user_id
     * @user_id int
     * @param $startDate datetime
     * @param $endDate datetime
     * @return $total int
     */
    public static function getTotalAmount($startDate, $endDate, $user_id){
        $incomes = \DB::table('incomes')
            ->join('users', 'users.id', '=', 'incomes.user_id')
            ->select('incomes.id',
                'incomes.created_at',
                'incomes.amount')
            ->whereRaw("`incomes`.`created_at`> '$startDate'
                    AND `incomes`.`created_at`<'$endDate'
                    AND `incomes`.`user_id`='$user_id'")
            ->orderBy('incomes.created_at','desc')
            ->sum('incomes.amount');
        return $incomes;
    }


    //related to morph ( account, user, category)
    public function accounts()
    {
        return $this->hasMany('account','id','category_id');
    }

    public function categories()
    {
        return $this->hasMany('category','id','category_id');
    }

    public function users()
    {
        return $this->hasMany('user','id','user_id');
    }

}