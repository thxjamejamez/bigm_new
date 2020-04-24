<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCate extends Model
{
    protected $table = "product_categories";
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Products', 'category_id', 'id');
    }
}
