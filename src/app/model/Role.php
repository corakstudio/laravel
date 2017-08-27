<?php

namespace CorakStudio\Rising\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = "roles";
    protected $fillable = [
        'name','description'
    ];
    protected $filter = [
    	'name','created_at',

    	//user
    	'admin.username'
    ];

    public function admin()
    {
        return $this->hasMany('CorakStudio\Rising\Models\Admin');
    }

    public function permission()
    {
        return $this->belongsToMany('CorakStudio\Rising\Models\Permission','role_permissions');
    }
}
