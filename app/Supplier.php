<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'tbl_supplier';

    protected $fillable = [
        'name',
        'phone',
        'address',
        'description'
    ];
}
