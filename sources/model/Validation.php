<?php

class Validation
{
    static function clean($string): string
    {
        $cleaned = filter_var($string, FILTER_SANITIZE_STRING);;
        return $cleaned;
    }
}