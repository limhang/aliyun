<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = 'urlstore';
	public $timestamps = false;
    protected $fillable = ['detail','category','tag','url','userId','key'];

	public function urlquerykd($userId,$keyword)
	{
		$data = $this->where('userId',$userId)
		->where('detail',$keyword)
		->get();
		$res['lists'] = $data;
		return $res;
	}

    //按照category来查找内容
    public function urlquerycategory($userId,$category)
    {
        $data = $this->where('userId',$userId)
            ->where('category',$category)
            ->distinct()
            ->get();
        $res['category'] = $data;
        return $res;
    }

    public function urlquerypage($userId,$page=1,$page_num=5)
    {
		if ($page_num >= 20) {
			$page_num = 20;
		}
		if ($page_num <= 1){
			$page_nume = 1;
		}
		$total = $this->where('userId',$userId)->count();
		$page_total = ceil($total/$page_num);
		if ($page<=1) {
			$page = 1;	
		}
		if ($page>=$page_total) {
			$page = $page_total;	
		}
		$skip = ($page-1)*$page_num;
        $data = $this->where('userId',$userId)
            ->orderBy('id','asc')
			->skip($skip)
            ->take($page_num)
            ->get();
        $res['lists'] = $data;
		$res['total'] = $total;
		$res['page']  = $page;
        return $res;
    }

    //更新指定数据
    public function urlupdate($data)
    {
        $url = $data['url'];
        $userId = $data['userId'];
        $tag = ($data['tag']) ? $data['tag'] : null;
        $detail = ($data['detail']) ? $data['detail'] : null;
        $category = ($data['category']) ? $data['category'] : null;
		$key = $data['key'];
		$rekey = md5($userId.$url);
        $this->where('key',$key)
        //    ->where('url',$url)
            ->update(['url'=>$url, 'tag'=>$tag, 'detail'=>$detail, 'category'=>$category, 'key'=>$rekey]);
        $res['lists'] = null;
        return $res;
    }

    //删除指定数据
    public function urldelete($data)
    {
        $key = $data['key'];
        $this->where('key',$key)
            ->delete();
        $res['delete'] = null;
        return $res;
    }
}
