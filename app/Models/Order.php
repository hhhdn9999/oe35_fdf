<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function user()
    {

        return $this->belongTo('App\Models\User');
    }

    public function orderdetail()
    {

        return $this->hasMany('App\Models\OrderDetail');
    }
}
