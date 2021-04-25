<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//额外服务
$router->group(['prefix' => 'admin'], function () use ($router) {
    // 添加
    $router->get('index', ['uses' => 'Admin\AdminController@index']);

});
