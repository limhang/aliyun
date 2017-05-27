<?php
/**
 * 轮播 api接口
 */
namespace App\Http\Controllers\v1_0\Common;

use App\Http\Controllers\Controller;
use App\Models\BaseInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class BaseInfoController extends Controller
{
    protected $baseInfo;
    public function __construct(BaseInfo $baseInfo)
    {
        $this->baseInfo = $baseInfo;
    }

    /**
     * 公告列表 
     * @return \Illuminate\Http\JsonResponse
     */
    public function lists(Request $request)
    {
        $page = $request->input('page',1);
        $page_num = $request->input('page_num',5);
        $datas = $this->baseInfo->lists($page,$page_num);
        return $this->apiResponse($datas);
    }
}
