<?php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
 
class MyHelper {

    public static function indocurrency($value) {
        $rupiah = "Rp " . number_format($value,0,',','.');
        return $rupiah;
    }
}