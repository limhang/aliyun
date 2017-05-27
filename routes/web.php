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

$app->get('faa', function () {
	    return 'Hello World';
});

//公共路由
$app->group(['namespace' => 'v1_0\Common', 'prefix' => 'v1_0/common'], function($app){
    //公告通知 有关路由
    $app->get('baseInfo/lists',['as'=>'baseInfo.lists','uses'=>'BaseInfoController@lists']);
});