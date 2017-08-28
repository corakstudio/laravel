<?php

return [

    'auth' => [
        'captcha' => true,
        'email_validation' => true,
        'max_attemp_login' => 3,
        'banned_time' => 1, /*in Minute*/
        'default_avatar' => 'users/default.jpg',
        'default_role'=> 2, //admin viewer
    ],

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'admins',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'admins',
        ],
    ],

    
    'providers' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' => CorakStudio\Rising\Models\Admin::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    'passwords' => [
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
