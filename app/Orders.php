<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";
    public $timestamps = false;

    public function getProductInOrder($order_id, $byUser = false)
    {
        $product = \DB::table('orders')
            ->join('quotations', 'orders.quotation_id', '=', 'quotations.id')
            ->join('quotation_products', 'quotations.id', '=', 'quotation_products.quotation_id')
            ->join('product_formats', 'quotation_products.product_format_id', '=', 'product_formats.id')
            ->where('orders.id', $order_id)
            ->when($byUser, function ($query) use ($byUser) {
                $query->where('quotations.required_by', $byUser);
            })
            ->select(
                'quotation_products.id as quotation_product_id',
                'quotation_products.product_format_id',
                'product_formats.img_path',
                'product_formats.name'
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
