<?php

class FrontController
{
    private array $userActions = array('logout', 'add-pv-list');
    private array $connectActions = array('login-form', 'login');

    public function __construct()
    {
        global $dir, $views;

        session_start();
        $tErrors = array();

        try {
            $user = UserModel::getUserInstance();

            //initialise action
            if (isset($_REQUEST['action'])) {
                $action = Validation::clean($_REQUEST['action']);
            } else {
                $action = NULL;
            }

            if (in_array($action, $this->connectActions)) {
                if ($user == null) {
                    $ctrl = new UserController();
                } else {
                    $tErrors[] = "Front Controller : unknown error";
                    require($dir . $views['error']);
                }
            } elseif (in_array($action, $this->userActions)) {
                if ($user == null) {
                    $_REQUEST['action'] = 'login-form';
                }
                $ctrl = new UserController();
            } else {
                if ($user != null) {
                    $ctrl = new UserController();
                } else {
                    $ctrl = new VisitorController();
                }
            }
        } catch (PDOException $e) {
            echo $e;
            $tErrors[] = "Front Controller : error database";
            require($dir . $views['error']);
        } catch (Exception $e2) {
            echo $e2;
            $tErrors[] = "Front Controller : unknown error";
            require($dir . $views['error']);
        }
    }

}