<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Cartalyst\Sentry\Users\Eloquent\User {

	use UserTrait, RemindableTrait;

    public static $rules = [
        'username' => 'required',
        'email' => 'email',
        'password' => 'required|Same:password2',
    ];
    // Don't forget to fill this array
   // protected $fillable = ['project_id','name','start','end','process','coder_id'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


    //list all user in a $group
    public function scopeByGroup($query,$group){
        if(in_array($group,['member','admin','customer','manager'])){
            return $query->whereHas("groups",function($q) use($group){
                $q->where("name",'=',$group);
            });
        }else {
            return $query;
        }
    }


    // project where user manage
    public function manageProjects()
    {
        return $this->hasMany('Project','manager_id');
    }


    //proejct where user join
    public function projects()
    {
        return $this->belongsToMany('Project');
    }


    public function salaries()
    {
        return $this->hasMany('Salary','member_id','id')->orderBy('created_at','desc');
    }

}
