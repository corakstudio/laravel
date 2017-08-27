<?php

namespace CorakStudio\Rising;
use Illuminate\Database\Seeder;
use Faker\Factory;
use CorakStudio\Rising\Models\Admin;
use CorakStudio\Rising\Models\AdminDetail;
use CorakStudio\Rising\Models\Role;
use CorakStudio\Rising\Models\Permission;
use CorakStudio\Rising\Models\RolePermission;

class RisingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	static $password;

        $faker = Factory::create();
    	$role = Role::create([
    		'id' => 1,
            'name' => 'admin',
            'description' => $faker->text
        ]);

        $permission = Permission::create([
            'name'=>'Administrator List',
            'controller'=>'administrator',
            'action'=>'index',
            'group'=>'Administrators',
            'description'=>$faker->text
        ]);

        $rolepermission = RolePermission::create([
            'role_id' =>$role->id,
            'permission_id' => $permission->id
        ]);

    	$admin = Admin::create([
    		'username'=>'administrator',
    		'email'=>'corak.studio33@gmail.com',
    	    'password' => $password ?: $password = bcrypt('12345'),
    	    'remember_token' => str_random(10),
	        'email_valid'=> true,
	        'email_token'=> str_random(10),
	        'is_active'=> true,
	        'role_id'=> $role->id,
    	]);
    	$admin_details = AdminDetail::create([
    		'admin_id' =>$admin->id,
    		'firstname' => 'Corak',
    		'lastname' =>'Studio'
    	]);
        
    }
}
