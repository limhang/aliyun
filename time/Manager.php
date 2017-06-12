<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = 'manager';
    public $fillable = ['duration','user_id','timeType','desc','loadTime'];

    public function add($data)
    {
        $res = $this->create($data);
        return $res;
    }

}