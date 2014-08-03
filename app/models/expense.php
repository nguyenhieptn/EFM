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
            'amount'    => 'Integer|required',
            'payee_id'    => 'Integer',
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

    public function payee()
    {
        return $this->belongTo('payee_id','id','payee_id');
    }

}