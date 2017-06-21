<?php


namespace App\Http\Controllers\v1_0\Time;


use App\Http\Controllers\AuthController;
use App\Models\Manager;
use App\Models\Users;
use Illuminate\Http\Request;


class TimeManagerController extends AuthController
{
    protected $manager;
    protected $users;
    public function __construct(Request $request,Manager $manager,Users $users)
    {
        parent::__construct($request);
        $this->manager = $manager;
        $this->users = $users;
    }

    /**
     * 添加模式
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function timecreate(Request $request)
    {
        $user_info = $this->user_info;
        $user_id = $user_info->username;
        $data = $request->all();
        $data['user_id'] = $user_id;
		unset($data['token']);
        $res = $this->manager->create($data);
        return $this->apiResponse($res);
    }

	public function timequery(Request $request)
	{
		$user_info = $this->user_info;
		$user_id = $user_info->username;
		$queryTime = $request->input('time','0');
		$res = $this->manager->timequery($user_id,$queryTime);
		return $this->apiResponse($res);
	}

}
