<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = 'manager';
	public $timestamps = false;
    protected $fillable = ['duration','user_id','timeType','timedesc','loadTime'];

	public function timequery($user_id,$queryTime)
	{
		echo $user_id;
		echo $queryTime;
		$data = $this->where('user_id',$user_id)
		->where('loadTime',$queryTime)
		->get();
		$res['lists'] = $data;
		return $res;
	}
}
