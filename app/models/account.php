<?php
use Illuminate\Database\Eloquent;

class Account extends \Eloquent
{
    protected $table='accounts';
    protected $fillable = array('name','amount');

    public static function rules()
    {
        return  array(
            'name'    => 'required', // name of category
        );
    }
}