<?php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
 
class MyHelper {

    public static function indocurrency($value) {
        $rupiah = "Rp " . number_format($value,0,',','.');
        return $rupiah;
    }

    public function readable_random_string($length = 6)
    {  
        $string = '';
        $vowels = array("a","e","i","o","u");  
        $consonants = array(
            'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 
            'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z'
        );  

        $max = $length / 2;
        for ($i = 1; $i <= $max; $i++)
        {
            $string .= $consonants[rand(0,19)];
            $string .= $vowels[rand(0,4)];
        }

        return $string;
    }
}