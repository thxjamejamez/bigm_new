<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Material;

class MaterialController extends Controller
{
    public function view()
    {
        $listMaterial = Material::All();
        return view('apanel.material.app',compact('listMaterial'));
    }

    public function remove($id)
    {
        Material::remove($id);
        
        return redirect('apanel.material.app');
    }


}

