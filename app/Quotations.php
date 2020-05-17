<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotations extends Model
{
    protected $table = "quotations";
    public $timestamps = false;

    public function productInQuotation($id)
    {
        $product = \DB::table('quotations')
            ->join('quotation_products', 'quotations.id', '=', 'quotation_products.quotation_id')
            ->join('product_formats', 'quotation_products.product_format_id', '=', 'product_formats.id')
            ->join('product_categories', 'product_formats.category_id', '=', 'product_categories.id')
            ->where('quotations.id', $id)
            ->select(
                'quotation_products.id as quotation_product_id',
                'quotation_products.product_format_id',
                'product_formats.img_path',
                'product_formats.name',
                'product_categories.name as pd_cate_name'
            )
            ->get();

        $result = collect($product)->map(function ($item) {
            $item->details = \DB::table('quotation_product_details')
                ->where('quotation_product_details.quotation_product_id', $item->quotation_product_id)
                ->select(
                    'quotation_product_details.size',
                    'quotation_product_details.qty',
                    'quotation_product_details.price_per_unit'
                )
                ->get();
            return $item;
        });

        return $result;
    }
}