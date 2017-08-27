<?php
Route::get('rising', function () {
    echo 'dasdsad';
});
Route::get('add/{a}/{b}', 'CorakStudio\Rising\Controllers\DashboardController@add');
Route::get('admin', 'CorakStudio\Rising\Controllers\DashboardController@admin');
Route::get('profile', 'CorakStudio\Rising\Controllers\DashboardController@profile');

Route::get('role', 'CorakStudio\Rising\Controllers\DashboardController@role');

Route::get('permission', 'CorakStudio\Rising\Controllers\DashboardController@permission');
