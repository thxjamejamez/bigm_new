<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";
    public $timestamps = false;

    public function details()
    {
        return $this->hasMany('App\OrderDetail', 'order_id', 'id');
    }
}
