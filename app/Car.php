<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'tbl_car';

    protected $fillable = [
        'name', 
        'category_id',
        'price',
        'stock',
        'image'
    ];
}
