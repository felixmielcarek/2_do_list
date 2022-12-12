<?php

class FrontController
{
    private array $visitorActions = array('add-list', 'delete-list', 'add-task', 'delete-task', 'valid-task');
    private array $userActions = array('logout', 'add-pv-list', 'delete-pv-list');
    private array $connectActions = array('login-form', 'login');

    public function __construct()
    {
        global $dir, $views;

        session_start();
        $tErrors = array();

        try {
            $user = UserController::getUserInstance();

            //initialise action
            if (isset($_REQUEST['action'])) {
                $action = Validation::clean($_REQUEST['action']);
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
                if (in_array($action, $this->visitorActions)) {
                    $ctrl = new VisitorController();
                } elseif (in_array($action, $this->userActions)) {
                    if ($user == null) {
                        $tErrors[] = "Front Controller : error action";
                        require($dir . $views['error']);
                    } else {
                        $ctrl = new UserController();
                    }
                } elseif (in_array($action, $this->connectActions)) {
                    if ($user != null) {
                        $tErrors[] = "Front Controller : error action";
                        require($dir . $views['error']);
                    } else {
                        $ctrl = new UserController();
                    }
                } else {
                    $tErrors[] = "Front Controller : error action";
                    require($dir . $views['error']);
                }
            }
        } catch (PDOException $e) {
            //si error BD, pas le cas ici
            echo $e;
            $tErrors[] = "Front Controller : error database";
            require($dir . $views['error']);
        } catch (Exception $e2) {
            $tErrors[] = "Front Controller : unknown error";
            require($dir . $views['error']);
        }
    }

}