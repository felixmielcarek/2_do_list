<?php

class Validation
{
    static function Clean($string): string
    {
        $cleaned = filter_var($string, FILTER_SANITIZE_STRING);;
        return $cleaned;
    }

    static function Verify($string): bool
    {
        if (strlen($string) < 1) {
            return false;
        } else {

        }
    }

    static function IsValidEmail($string): bool
    {
        if (!filter_var($string, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    static function IsValidName($string): bool
    {

    }

    static function IsValidPassword($string): bool
    {

    }
}