<?php

namespace CorakStudio\Rising\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use CorakStudio\Rising\Models\Admin;
use CorakStudio\Rising\Models\AdminDetail;
use CorakStudio\Rising\Models\Role;
use CorakStudio\Rising\Models\Permission;

class DashboardController extends Controller
{
    public function add($a, $b){
    	$result = $a + $b;
		return view('rising::dashboard', compact('result'));
    }

    public function admin(){
    	$admin = Admin::with(['role','profile'])->find(1);
		return response()->json([
			'data'=> $admin

		]);
    }

    public function profile(){
    	$profile = AdminDetail::with(['account'])->where('admin_id',1)->get();
		return response()->json([
			'data'=> $profile
		]);
    }

    public function role(){
        $role = Role::with(['admin','permission'])->find(1);
        return response()->json([
            'data'=> $role
        ]);
    }

    public function permission(){
        $permission = Permission::with(['role'])->find(1);
        return response()->json([
            'data'=> $permission
        ]);
    }


}
