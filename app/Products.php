<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Products extends Model
{
    protected $table = "product_formats";
    public $timestamps = false;

    public function getProductFormatList(require_by)
    {
        $pd_f = \DB::table('product_formats')
            ->join('product_categories', 'product_formats.category_id', '=', 'product_categories.id')
            ->where('product_formats.created_by', 1)
            ->when(isset(\Auth::user()->id), function ($query) {
                $query->where('product_formats.created_by', \Auth::user()->id);
            })
            ->select(
                'product_formats.id as pd_f_id',
                'product_formats.name as pd_f_name',
                'product_formats.img_path',
                'product_categories.id as pd_cate_id',
                'product_categories.name as pd_cate_name'
            )
            ->get();
        return $pd_f;
    }
}
