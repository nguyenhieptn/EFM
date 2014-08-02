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