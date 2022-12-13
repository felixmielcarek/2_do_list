<?php

class UserController
{
    public function __construct()
    {
        global $dir, $views;

        $tErrors = array();

        if (isset($_REQUEST['action'])) {
            $action = Validation::clean($_REQUEST['action']);
        } else {
            $action = NULL;
        }

        switch ($action) {
            case NULL:
                $this->home();
                break;
            case 'login-form' :
                $this->loginForm();
                break;
            case 'login':
                $this->login();
                break;
            case "logout":
                $this->logout();
                break;
            case 'add-pv-list':
                $this->addPvList();
                break;
            default:
                $tErrors[] = "User Controller : error action";
                require($dir . $views['error']);
                break;
        }
    }

    private function home(): void
    {
        if ($this->isConnected()) {
            $this->display();
        } else {
            $this->displayError();
        }
    }

    private function isConnected(): bool
    {
        return (UserModel::getUserInstance() != null);
    }

    private function display(): void
    {
        global $dir, $views;

        $user = UserModel::getUserInstance();

        $um = new UserModel();
        $vm = new VisitorModel();

        $id = $user->getId();

        $pubLists = $vm->getLists();
        $pubTasks = $vm->getTasks();
        $pvLists = $um->getLists($id);
        $pvTasks = $um->getTasks($id);

        require($dir . $views['startMainView']);
        require($dir . $views['privateLists']);
        require($dir . $views['endMainView']);

    }

    private function displayError(): void
    {
        global $dir, $views;
        require($dir . $views['error']);
    }

    private function loginForm(): void
    {
        if (!$this->isConnected()) {
            $this->displayPublic('loginForm');
        } else {
            $this->displayError();
        }
    }

    private function displayPublic($rightPage): void
    {
        global $dir, $views;

        $vm = new VisitorModel();

        $pubLists = $vm->getLists();
        $pubTasks = $vm->getTasks();

        require($dir . $views['startMainView']);
        require($dir . $views[$rightPage]);
        require($dir . $views['endMainView']);
    }

    private function login(): void
    {
        if (!$this->isConnected()) {
            $model = new UserModel();

            $name = Validation::clean($_POST['log-name']);
            $passwd = Validation::clean($_POST['log-passwd']);

            $user = $model->login($name, $passwd);

            if ($user != null) {
                $this->display();
            } else {
                // TODO : indicate that password or name is incorrect
                $this->loginForm();
            }
        } else {
            $this->displayError();
        }
    }

    private function logout(): void
    {
        if ($this->isConnected()) {
            $mdl = new UserModel();
            $mdl->logout();

            $this->displayPublic('notConnected');
        } else {
            $this->displayError();
        }
    }

    private function addPvList(): void
    {
        if ($this->isConnected()) {
            $user = UserModel::getUserInstance();
            $author = $user->getId();

            $model = new UserModel();

            $title = Validation::clean($_POST['list-title']);
            $description = Validation::clean($_POST['list-description']);

            $model->addPvList($author, $title, $description);
            $this->display();
        } else {
            $this->displayError();
        }
    }
}