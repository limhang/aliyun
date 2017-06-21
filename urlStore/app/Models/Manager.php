<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = 'urlstore';
	public $timestamps = false;
    protected $fillable = ['detail','category','tag','url','userId'];

	public function urlquery($userId,$keyword)
	{
		$data = $this->where('userId',$userId)
		->where('detail',$keyword)
		->get();
		$res['lists'] = $data;
		return $res;
	}
}
