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


}

