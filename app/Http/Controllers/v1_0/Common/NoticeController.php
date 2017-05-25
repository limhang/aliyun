<?php
/**
 * 轮播 api接口
 */
namespace App\Http\Controllers\v1_0\Common;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class NoticeController extends Controller
{
    protected $notice;
    public function __construct(Notice $notice)
    {
        $this->notice = $notice;
    }

    /**
     * 公告列表 
     * @return \Illuminate\Http\JsonResponse
     */
    public function lists(Request $request)
    {
        $page = $request->input('page',1);
        $page_num = $request->input('page_num',5);
        $datas = $this->notice->lists($page,$page_num);
        return $this->apiResponse($datas);
    }
}
