<?php

namespace App\Helpers;
use App\Shelter;


/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 22.11.2018
 * Time: 19:15
 */

trait USKeyGenerator {

    public static function generateUSKey() {
        $shelters = Shelter::all();

        $allKeys = $shelters->pluck('uskey');

        do {
            $usKey = str_random(5);
        } while (in_array($usKey, $allKeys->toArray()));

        return $usKey;
    }
}