<?php

class FrontController
{
    private array $userActions = array('logout', 'register');

    public function __construct()
    {
        global $dir, $views;

        session_start();
        $tErrors = array();

        //initialise action
        if (isset($_REQUEST['action'])) {
            $action = $_REQUEST['action'];
            //TODO : filtrer action
        } else {
            $action = NULL;
        }

        try {
            $user = UserController::getUserInstance();

            if (in_array($action, $this->userActions)) {
                if ($user == null) {
                    $_REQUEST['action'] = 'connection';
                    $ctrl = new VisitorController();
                } else {
                    $ctrl = new UserController();
                }
            } else {
                $ctrl = new VisitorController();
            }
        } catch (PDOException $e) {
            //si error BD, pas le cas ici
            echo $e;
            $tErrors[] = "Erreur inattendue!!! ";
            require($dir . $views['error']);
        } catch (Exception $e2) {
            $tErrors[] = "Erreur inattendue!!! ";
            require($dir . $views['error']);
        }
        //fin
        exit(0);
    }

}