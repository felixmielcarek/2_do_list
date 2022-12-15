<?php

/**
 * Classes permettant d'affecter les tâches aux bons controllers
 */
class FrontController
{
    public array $tErrors;
    /**
     * @var array|string[]
     *
     * Listes des actions propres à un User
     */
    private array $userActions = array('logout', 'add-pv-list');

    public function __construct()
    {
        global $dir, $views;

        session_start();
        $this->tErrors = array();

        try {
            $user = UserModel::getUserInstance();

            //initialise action
            if (isset($_REQUEST['action'])) {
                $action = Validation::clean($_REQUEST['action']);
            } else {
                $action = NULL;
            }

            if (in_array($action, $this->userActions)) {
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
            $this->tErrors[] = "Front Controller : error database";
            require($dir . $views['error']);
        } catch (Exception $e2) {
            echo $e2;
            $this->tErrors[] = "Front Controller : unknown error";
            require($dir . $views['error']);
        }
    }

}