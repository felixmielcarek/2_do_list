<?php

class UserController extends CanDisplay
{
    public function __construct()
    {
        global $dir, $views;

        try {
            if (isset($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
                //TODO : filtrer action
            } else {
                $action = NULL;
            }

            switch ($action) {
                case "login":
                    $this->login();
                    break;
                default:
                    $tErrors[] = "Erreur d'appel php";
                    require($dir . $views['error']);
                    break;
            }
        } catch (PDOException $e) {
            //si error BD, pas le cas ici
            echo $e;
            echo phpinfo();
            $tErrors[] = "Erreur inattendue!!! ";
            require($dir . $views['error']);
        } catch (Exception $e2) {
            $tErrors[] = "Erreur inattendue!!! ";
            echo 'test2';

            require($dir . $views['error']);
        }
    }

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