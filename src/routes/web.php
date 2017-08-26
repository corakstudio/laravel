<?php
Route::get('rising', function () {
    echo 'dasdsad';
});
Route::get('add/{a}/{b}', 'CorakStudio\Rising\Controllers\DashboardController@add');
