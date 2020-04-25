<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custinfo extends Model
{
    protected $table = "customer_info";
    public $timestamps = false;
    protected $fillable = ['user_id', 'title_id', 'first_name', 'last_name', 'birthdate', 'address', 'district_id', 'tel'];
}
