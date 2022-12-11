<?php

class FrontController
{
    private array $userActions = array('logout', 'login-form', 'login');

    public function __construct()
    {
        global $dir, $views;

        session_start();
        $tErrors = array();

        try {
            $user = UserController::getUserInstance();

            //initialise action
            if (isset($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
                //TODO : filtrer action
            } else {
                $action = NULL;
            }

            if ($action == null) {
                if ($user == null) {
                    $ctrl = new VisitorController();
                } else {
                    $ctrl = new UserController();
                }
            } else {
                if (in_array($action, $this->userActions)) {
                    if ($user == null) {
                        $_REQUEST['action'] = 'login-form';
                    }
                    $ctrl = new UserController();
                } else {
                    $ctrl = new VisitorController();
                }
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
    }

}