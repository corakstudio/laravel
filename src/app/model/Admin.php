<?php

namespace CorakStudio\Rising\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use Notifiable;
    protected $table = "admins";
    protected $fillable = [
        'username', 'email', 'password','avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $filter = [
    	'id','username','email','is_active','created_at',

    	//profile
    	'profile.admin_id','profile.firstname','profile.lastname',
    	
    	//role
    	'role.id','role.name'
    ];

    public function profile()
    {
        return $this->hasOne('CorakStudio\Rising\Models\AdminDetail');
    }

    public function role(){
    	return $this->belongsTo('CorakStudio\Rising\Models\Role');
    }
}
