<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    protected $fillable = array('name','username','password','email');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password','password2');

    /*
     * user rules
     */
    public static function rules()
    {
        return  array(
            'username'   => 'required|unique:users',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:6|same:password2',
            'password2'  => 'required|min:6'
        );
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function accounts()
    {
        return $this->hasMany('account');
    }

    public function categories()
    {
        return $this->hasMany('category');
    }

    //related to income-user 1-n
    public function income()
    {
        return $this->belongsTo('income');
    }

}
