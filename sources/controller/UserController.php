<?php

class UserController
{
    public function __construct()
    {
        global $dir, $views;

        $tErrors = array();

        try {
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
        } catch (PDOException $e) {
            //si error BD, pas le cas ici
            echo $e;
            echo phpinfo();
            $tErrors[] = "User Controller : error database";
            require($dir . $views['error']);
        } catch (Exception $e2) {
            $tErrors[] = "User Controller : unknown error";
            require($dir . $views['error']);
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
        return (self::getUserInstance() != null);
    }

    public static function getUserInstance(): ?User
    {
        if (isset($_SESSION['user-id']) && $_SESSION['user-id'] != null && isset($_SESSION['user-name']) && $_SESSION['user-name'] != null) {
            $id = Validation::clean($_SESSION['user-id']);
            $name = Validation::clean($_SESSION['user-name']);
            return new User($id, $name);
        } else return null;
    }

    private function display(): void
    {
        global $dir, $views;

        $user = $this->getUserInstance();

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
                $_SESSION['user-id'] = $user->getId();
                $_SESSION['user-name'] = $user->getName();
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
            session_unset();
            session_destroy();
            $_SESSION = array();

            $this->displayPublic('notConnected');
        } else {
            $this->displayError();
        }
    }

    private function addPvList(): void
    {
        if ($this->isConnected()) {
            $user = $this->getUserInstance();
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