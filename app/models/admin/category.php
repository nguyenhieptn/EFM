<?php
namespace models\admin;
use Illuminate\Database\Eloquent;

class Category extends \Eloquent
{
    protected $table='categories';
    protected $fillable = array('name','type');

    public static function rules()
    {
        return  array(
            'name'    => 'required', // name of category
        );
    }
}