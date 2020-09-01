<?php

namespace App\Models;
use App\User;
use Eloquent;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
    ];

    public function user()
    {

        return $this->belongTo(User::class);
    }

    public function orderdetail()
    {

        return $this->hasMany(OrderDetail::class);
    }
}
