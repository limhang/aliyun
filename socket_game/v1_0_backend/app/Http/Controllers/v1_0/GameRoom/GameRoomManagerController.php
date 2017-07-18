<?php

namespace App\Http\Controllers\v1_0\GameRoom;

use App\Http\Controllers\AuthController;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class GameRoomManagerController extends AuthController
{
    protected $manager;
    protected $users;
    public function __construct(Request $request,Users $users)
    {
        parent::__construct($request);
        $this->users = $users;
    }

    /**
     * 按照category模式查询数据
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setroom(Request $request)
    {
        $roomId = $request->input('roomId','');
        $userName = $request->input('username','');
        echo $roomId;
        echo $userName;
        Redis::put('roomId', $roomId, 60);
        Redis::put('userName',$userName, 60);
        $user_info = $this->user_info;
        $userId = $user_info->userId;
        $category = $request->input('category','');
        $res = $this->manager->urlquerycategory($userId,$category);
        return $this->apiResponse($res);
    }

}
