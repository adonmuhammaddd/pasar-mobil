<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tbl_customer';

    protected $fillable = [
        'name', 
        'phone', 
        'address'
    ];
}
