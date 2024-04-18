<?php

namespace App\Enums;

enum CommonSizeEnum:string {

    case sqft = 'sq ft';

    case sqm = 'sq m';   

    public static function randomValue(): string
    {
        $arr = array_column(self::cases(), 'value');

        return $arr[array_rand($arr)];
    }

    public static function randomName(): string
    {
        $arr = array_column(self::cases(), 'name');

        return $arr[array_rand($arr)];
    }
}