<?php

/**
 * Classe permettant d'appeler les bonnes méthodes pour les Visitor
 */
class VisitorController extends GlobalMethods
{
    public function __construct()
    {
        $this->tErrors = array();

        if (isset($_REQUEST['action'])) {
            $action = Validation::clean($_REQUEST['action']);
        } else {
            $action = NULL;
        }

        switch ($action) {
            case NULL:
                $this->display();
                break;
            case "add-list":
                $this->addList();
                break;
            case "delete-list":
                $this->deleteList();
                break;
            case "add-task":
                $this->addTask();
                break;
            case "delete-task":
                $this->deleteTask();
                break;
            case "valid-task":
                $this->validTask();
                break;
            case "search-list":
                $this->displaySearch();
                break;
            case 'login-form' :
                $this->display('loginForm');
                break;
            case 'login':
                $this->login();
                break;
            default:
                $this->tErrors[] = "Visitor Controller : error action";
                $this->displayError($this->tErrors);
                break;
        }
    }

    public function displaySearch(): void
    {
        global $dir, $views;

        $str = Validation::clean($_POST['list-title']);

        $model = new VisitorModel();
        if ($str == "") {
            $this->display();
        } else {
            $pubLists = $model->searchList(0, $str);
            $pubTasks = $model->getTasks(0);

            require($dir . $views['startMainView']);
            require($dir . $views['notConnected']);
            require($dir . $views['endMainView']);
        }
    }

    /**
     * @return void
     *
     * Gestion de la connexion
     */
    private function login(): void
    {
        $model = new UserModel();

        $name = Validation::clean($_POST['log-name']);
        $passwd = Validation::clean($_POST['log-passwd']);

        $user = $model->login($name, $passwd);

        if ($user != null) {
            $this->displayPrivate();
        } else {
            // TODO : indicate that password or name is incorrect
            $this->display('loginForm');
        }
    }
}//fin class
