<?php

use think\facade\Route;

Route::post('login', "Login/index");
Route::resource('user', 'user');
Route::rule('lists', 'mall.Lists/index');

