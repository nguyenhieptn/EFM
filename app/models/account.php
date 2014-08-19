<?php
use Illuminate\Database\Eloquent;

class Account extends \Eloquent
{
    protected $table='accounts';
    protected $fillable = array('name','amount','user_id');
    public $timestamps = false;

    public static function rules()
    {
        return  array(
            'name'    => 'required', // name of category
            'user_id'    => 'required|Integer', // name of category
        );
    }
}