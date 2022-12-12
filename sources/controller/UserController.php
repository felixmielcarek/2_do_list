<?php

class UserController
{
    public function __construct()
    {
        global $dir, $views;

        $tErrors = array();

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
                case 'add-pv-list':
                    $this->addPvList();
                    break;
                case 'delete-pv-list':
                    $this->deletePvList();
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
            $pvTasks = $um->getTasks($name);

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
        global $dir, $views;

        $vm = new VisitorModel();

        $pubLists = $vm->getLists();
        $pubTasks = $vm->getTasks();

        require($dir . $views['startMainView']);
        require($dir . $views['loginForm']);
        require($dir . $views['endMainView']);
    }

    private function login(): void
    {
        $model = new UserModel();

        $name = $_POST['name'];
        $passwd = $_POST['passwd'];

        $user = $model->login($name, $passwd);

        if ($user != null) {
            $_SESSION['name'] = $user->getName();
            $this->display('privateLists');
        } else {
            // TODO : indicate that password or name is incorrect
            $this->loginForm();
        }
    }

    private function logout(): void
    {
        global $dir, $views;

        $user = $this->getUserInstance();
        if ($user == null) {
            require($dir . $views['error']);
        } else {
            session_unset();
            session_destroy();
            $_SESSION = array();

            $vm = new VisitorModel();

            $pubLists = $vm->getLists();
            $pubTasks = $vm->getTasks();

            require($dir . $views['startMainView']);
            require($dir . $views['notConnected']);
            require($dir . $views['endMainView']);
        }
    }

    private function addPvList(): void
    {
        global $dir, $views;

        $user = $this->getUserInstance();
        if ($user == null) {
            require($dir . $views['error']);
        } else {
            $model = new VisitorModel();

            $author = 1;
            $title = $_POST['title'];
            $description = $_POST['description'];

            $model->addList($author, $title, $description);
            $this->display();
        }
    }

    private function deletePvList(): void
    {
        $model = new VisitorModel();

        $id = $_GET['id'];

        $model->deleteList($id);
        $this->display();
    }

    function rand_color(): string
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
}