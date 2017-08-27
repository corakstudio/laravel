<?php

namespace CorakStudio\Rising\Models;

use Illuminate\Database\Eloquent\Model;

class AdminDetail extends Model
{
	protected $table = "admin_details";
    protected $fillable = [
        'firstname', 'lastname', 'admin_id',
    ];

    public function account()
    {
        return $this->belongsTo('CorakStudio\Rising\Models\Admin');
    }
}
