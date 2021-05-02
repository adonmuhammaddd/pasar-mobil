<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'tbl_stock';

    protected $fillable = [
        'car_id',
        'type',
        'detail',
        'supplier_id',
        'quantity',
        'user_id'
    ];
}
