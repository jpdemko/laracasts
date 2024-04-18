<?php

class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);
        $len = strlen($value);
        return $len >= $min and $len <= $max;
    }
}
