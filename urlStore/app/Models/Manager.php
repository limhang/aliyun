<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = 'urlstore';
	public $timestamps = false;
    protected $fillable = ['detail','category','tag','url','userId'];

	public function urlquerykd($userId,$keyword)
	{
		$data = $this->where('userId',$userId)
		->where('detail',$keyword)
		->get();
		$res['lists'] = $data;
		return $res;
	}

    public function urlquerypage($userId,$page)
    {
        $data = $this->where('userId',$userId)
            ->orderBy('id','desc')
            ->take($page)
            ->get();
        $res['lists'] = $data;
        return $res;
    }

    public function urlupdate($data)
    {
        $url = $data['url'];
        $userId = $data[$userId];
        $tag = ($data['tag']) ? $data['tag'] : null;
        $detail = ($data['detail']) ? $data['detail'] : null;
        $category = ($data['category']) ? $data['category'] : null;
        $this->where('userId',$userId)
            ->where('url',$url)
            ->update(['tag'=>$tag, 'detail'=>$detail, 'category'=>$category]);
        $res['lists'] = null;
        return $res;
    }
}
