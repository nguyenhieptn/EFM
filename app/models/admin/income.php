<?php
namespace models\admin;

class Income extends \Eloquent
{
    protected $table='categories';
    protected $fillable = array('name');

    public static function rules()
    {
        return  array(
            'name'    => 'required', // name of category
        );
    }
}