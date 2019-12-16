<?php

Route::get('admin/code/captcha/{tmp}', 'Admin\LoginController@captcha');
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    //后台登录路由
    Route::get('login','LoginController@login');
//验证码路由
    Route::get('code','LoginController@code');

//处理后台登录的路由
    Route::post('dologin','LoginController@doLogin');
//加密算法
    Route::get('jiami','LoginController@jiami');
});


//注册中间件防止直接进入index后台
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'IsLogin'],function (){
//后台首页路由
    Route::get('index','LoginController@index');
//后台欢迎页
    Route::get('welcome','LoginController@welcome');
//后台退出登录路由
    Route::get('logout','LoginController@logout');
    //后台用户模块相关路由
    Route::resource('user','UserController');
});
