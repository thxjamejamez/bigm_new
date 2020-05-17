<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function view()
    {
        $product = \App\Products::where('product_formats.category_id', 1)
            ->join('users', 'product_formats.created_by', '=', 'users.id')
            ->where('product_formats.active', '!=', 0)
            ->select(
                'product_formats.*',
                'users.name as created_by'
            )
            ->get();

        return view('apanel.product.app', ['product' => $product,]);
    }

    public function store(Request $request)
    {
        $imageName = time() . '.' . $request->product_img->getClientOriginalExtension();
        $request->product_img->move(public_path('storage/product'), $imageName);
        \DB::table('product_formats')->insert([
            'name' => $request->product_name,
            'img_path' => '/storage/product/' . $imageName,
            'category_id' => 1,
            'created_by' => \Auth::user()->id,
            'active' => 1
        ]);

        return redirect()->route('viewProduct');
    }

    public function inactiveProduct($id)
    {
        \DB::table('product_formats')
            ->where('product_formats.id', $id)
            ->update([
                'product_formats.active' => 0
            ]);

        return redirect()->route('viewProduct');
    }

    public function updateProduct($id, Request $request)
    {
        $imageName = time() . '.' . $request->img_product->getClientOriginalExtension();
        $request->img_product->move(public_path('storage/product'), $imageName);
        \DB::table('product_formats')
            ->where('product_formats.id', $id)
            ->update([
                'name' => $request->product_name,
                'product_formats.img_path' => '/storage/product/' . $imageName,
            ]);

        return redirect()->route('viewProduct');
    }

    public function RemoveProductPic($id)
    {
        $product = \App\Products::find($id);
        $img_path_pd = public_path() . $product->img_path;
        unlink($img_path_pd);
        $product->img_path = '';
        $product->save();

        return redirect()->back();
    }

    public function viewDetail($id)
    {
        $product = \App\Products::where('product_formats.id', $id)->first();
        return view('apanel.product.components.detail', ['product' => $product]);
    }
}
