<?php 
use think\facade\Route;

Route::get('hello', 'index/hello');
//在路由文件指定控制器添加中间件
Route::get('detail', 'Detail/index')->middleware( app\demo\middleware\Detail::class);
?>