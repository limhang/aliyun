<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

//用户有关路由
$app->group(['namespace' => 'v1_0\Person', 'prefix' => 'v1_0/person'], function($app){

    //用户注册
    $app->post('user/register',['as'=>'user.register','uses'=>'UserController@register']);

    $app->post('user/login',['as'=>'user.login','uses'=>'UserController@login']);

});

//time模块有关路由
$app->group(['namespace' => 'v1_0\Url', 'prefix' => 'v1_0/url'], function($app){
	//添加时间管理项
	$app->post('user/urlcreate',['as'=>'user.urlcreate','uses'=>'UrlManagerController@urlcreate']);
	//查询用户某天时间所有项
	$app->post('user/urlquery',['as'=>'user.urlquery','uses'=>'UrlManagerController@urlquery']);
});
