<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function order()
    {

        return $this->belongTo('App\Models\Order');
    }

    public function product()
    {

        return $this->belongTo('App\Models\Product');
    }
}
