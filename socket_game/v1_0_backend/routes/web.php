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
    $app->get('user/register',['as'=>'user.register','uses'=>'UserController@register']);

    $app->get('user/login',['as'=>'user.login','uses'=>'UserController@login']);

});

//游戏房间信息
$app->group(['namespace' => 'v1_0\GameRoom', 'prefix' => 'v1_0/gameroom'], function($app){
	//创建游戏房间
	$app->get('gameroom/setroom',['as'=>'gameroom.setroom','gameroom'=>'GameRoomManagerController@setroom']);
	//更新url内容
    $app->get('user/urlupdate',['as'=>'user.urlupdate','uses'=>'UrlManagerController@urlupdate']);
});
