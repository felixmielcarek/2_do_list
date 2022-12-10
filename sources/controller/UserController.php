<?php

class UserController extends CanDisplay
{
    public static function getUserInstance(): ?User
    {
        if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
            // TODO : validate strings
            $login = $_SESSION['login'];
            $role = $_SESSION['role'];
            return new User($login, $role);
        } else return null;
    }
}