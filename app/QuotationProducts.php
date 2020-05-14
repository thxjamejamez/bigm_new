<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationProducts extends Model
{
    protected $table = "quotation_products";
    public $timestamps = false;

    public function details()
    {
        return $this->hasMany('App\QuotationProductDetails', 'quotation_product_id', 'id');
    }
}
