<?php

class UserController
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

    private function home(): void
    {
        $this->display('privateLists');
    }

    private function display($rightPage): void
    {
        global $dir, $views;

        $user = $this->getUserInstance();
        if ($user == null) {
            require($dir . $views['error']);
        } else {
            $um = new UserModel();
            $vm = new VisitorModel();

            $name = $user->getName();

            $pubLists = $vm->getLists();
            $pubTasks = $vm->getTasks();
            $pvLists = $um->getLists($name);
            $pvTasks = $um->getTasks();

            require($dir . $views['startMainView']);
            require($dir . $views[$rightPage]);
            require($dir . $views['endMainView']);
        }
    }

    public static function getUserInstance(): ?User
    {
        if (isset($_SESSION['name'])) {
            // TODO : validate strings
            $name = $_SESSION['name'];
            return new User($name);
        } else return null;
    }

    private function loginForm(): void
    {
        $this->display('loginForm');
    }

    private function login(): void
    {
        $model = new UserModel();

        $name = $_POST['name'];
        $passwd = $_POST['passwd'];

        $user = $model->login($name, $passwd);

        if ($user == null) {
            $this->display('privateLists');
        } else {
            // TODO : indicate that password or name is incorrect
            $this->display('notConnected');
        }
    }

    private function logout(): void
    {

    }
}