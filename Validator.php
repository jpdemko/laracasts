<?php

class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);
        $len = strlen($value);
        return $len >= $min and $len <= $max;
    }

    public static function email($value)
    {
        $out = filter_var($value, FILTER_VALIDATE_EMAIL);
        return $out;
    }
}
