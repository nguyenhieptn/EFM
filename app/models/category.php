<?php
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
    /*
     * relationship to user table
     */
    public function user()
    {
        $this->belongsTo('user','id');
    }

    public function income()
    {
        return $this->belongsTo('income','id');
    }
}