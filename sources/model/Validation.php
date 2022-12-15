<?php

class Validation
{
    /**
     * @param $string
     * @return string
     *
     * Nettoie la valeur donnée en parametre
     */
    static function clean($string): string
    {
        $cleaned = filter_var($string, FILTER_SANITIZE_STRING);;
        return $cleaned;
    }
}