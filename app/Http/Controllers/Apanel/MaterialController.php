<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Material;

class MaterialController extends Controller
{
    public function view()
    {
        $listMaterial = Material::where('l_decorative.active', 1)->get();
        return view('apanel.material.app',compact('listMaterial'));
    }

  
    public function store (Request $request)
    {
        \DB::table('l_decorative')->insert([
            'name' => $request->nameMaterial,
            'img_path' => '/img/defualt_product.jpg',
            'active' => 1
        ]);

        return redirect()->route('viewMaterial');
    }

    
    public function inactiveMaterial($id)
    {
        \DB::table('l_decorative')
            ->where('l_decorative.id', $id)
            ->update([
                'l_decorative.active' => 0
            ]);
        
        return redirect()->route('viewMaterial');
        
    }

    public function viewDetail($id)
    {
        $decorative = \App\Material::where('l_decorative.id', $id)->first();
        return view('apanel.material.components.detail', ['decorative' => $decorative]);
    }

    public function RemoveDecorativePic($id)
    {
        $decorative = \App\Material::find($id);
        $img_path_pd = public_path() . $decorative->img_path;
        unlink($img_path_pd);
        $decorative->img_path = '';
        $decorative->save();

        return redirect()->back();
    }

    public function updateMaterial($id, Request $request)
    {
        if($request->img_material==""){
            \DB::table('l_decorative')
                ->where('l_decorative.id', $id)
                ->update([
                    'name' => $request->name_material,
                ]);
    
            return redirect()->route('viewMaterial');
        }else{
            $imageName = time() . '.' . $request->img_material->getClientOriginalExtension();
            $request->img_material->move(public_path('storage/product'), $imageName);
            \DB::table('l_decorative')
                ->where('l_decorative.id', $id)
                ->update([
                    'name' => $request->name_material,
                    'l_decorative.img_path' => '/storage/product/' . $imageName,
                ]);
    
            return redirect()->route('viewMaterial');
        }

       
    }


}

