<?php

/**
 * Created by PhpStorm.
 * 公告model
 * User: lipeng
 * Date: 17/1/15
 * Time: 下午5:47
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'web_notice';

    public function lists($page= 1,$page_num= 5)
    {
        $datas = $this
            ->orderBy('id','desc')
            ->take($page_num)->get();
        $res['lists'] = $datas;
        return $res;
    }
}