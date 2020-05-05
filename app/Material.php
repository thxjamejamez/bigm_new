<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = "l_decorative";
    protected $fillable = ['id','name', 'price_per_unit', 'img_file', 'active'];
}
