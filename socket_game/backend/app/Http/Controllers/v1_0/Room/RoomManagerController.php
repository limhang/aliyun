<?php


namespace App\Http\Controllers\v1_0\Room;

use GatewayClient\Gateway;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RoomManagerController extends Controller
{
    protected $users;
    public function __construct(Request $request,Users $users)
    {
        parent::__construct($request);
        $this->users = $users;
		Gateway::$registerAddress = '127.0.0.1:1236';
    }

    /**
     * 添加模式
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function roomcreate(Request $request)
    {
		echo "xxxx";
		$roomId = $request->input('roomId','');
		$userName = $request->input('userName','');
		$client_id = $request->input('client_id');
		$uid = "test";
		Cache::put('roomId', $roomId, 60);
		Cache::put('userName',$userName,60);
		Gateway::bindUid($client_id,$uid);
		Gateway::sendToUid($uid,'hello');

    }

}
