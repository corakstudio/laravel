<?php

namespace CorakStudio\Rising\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	protected $table = "permissions";
    protected $fillable = ['name','controller','action','group','description'];
    protected $filter = [
    	'name','controller','action','group','created_at',
    	//role
    	'role.id','role.name'
    ];
    public function role()
    {
        return $this->belongsToMany('CorakStudio\Rising\Models\Role','role_permissions');
    }
}
