<?php

/**
 * Classe permettant d'appeler les bonnes méthodes pour les User
 */
class UserController extends GlobalMethods
{
    public function __construct()
    {
        $this->tErrors = array();

        if (UserModel::getUserInstance() == null) {
            $this->tErrors[] = "User Controller : error not connected";
            $this->displayError($this->tErrors);
            exit();
        }

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
            case "search-pv-list":
                $this->displayPvSearch();
                break;
            case "logout":
                $this->logout();
                break;
            case 'add-pv-list':
                $this->addPvList();
                break;
            default:
                $this->tErrors[] = "User Controller : error action";
                $this->displayError($this->tErrors);
                break;
        }
    }

    /**
     * @return void
     *
     * Affiche la page principale
     */
    public function display($rightPage = 'privateLists'): void
    {
        $this->displayPrivate();
    }

    public function displaySearch(): void
    {
        global $dir, $views;
        $str = Validation::clean($_POST['list-title']);
        $vm = new VisitorModel();
        if ($str == "") {
            $this->display();
        } else {
            $user = UserModel::getUserInstance();
            $id = $user->getId();

            $pubLists = $vm->getLists(0);
            $pubTasks = $vm->getTasks(0);

            $pvLists = $vm->searchList($id, $str);
            $pvTasks = $vm->getTasks($id);

            require($dir . $views['startMainView']);
            require($dir . $views['privateLists']);
            require($dir . $views['endMainView']);
        }
    }

    /**
     * @return void
     *
     * Affichage des listes privées recherchées
     */
    private function displayPvSearch(): void
    {
        global $dir, $views;

        $str = Validation::clean($_POST['list-title']);
        $user = UserModel::getUserInstance();

        $vm = new VisitorModel();

        $id = $user->getId();

        $pubLists = $vm->getLists(0);
        $pubTasks = $vm->getTasks(0);

        if ($str == "") {
            $this->display();
        } else {
            $pvLists = $vm->searchList($id, $str);
            $pvTasks = $vm->getTasks($id);

            require($dir . $views['startMainView']);
            require($dir . $views['privateLists']);
            require($dir . $views['endMainView']);
        }
    }

    /**
     * @return void
     *
     * Gestion de la déconnexion
     */
    private function logout(): void
    {
        if ($this->isConnected()) {
            $mdl = new UserModel();
            $mdl->logout();

            parent::display();
        } else {
            $this->tErrors[] = "Erreur : Problème lors de la déconnexion";
            $this->displayError($this->tErrors);
        }
    }

    /**
     * @return bool
     *
     * Indique si un utilisateur est connecté
     */
    private function isConnected(): bool
    {
        return (UserModel::getUserInstance() != null);
    }

    /**
     * @return void
     *
     * Ajout d'une liste privée
     */
    private function addPvList(): void
    {
        if ($this->isConnected()) {
            $user = UserModel::getUserInstance();
            $author = $user->getId();

            $model = new VisitorModel();

            $title = Validation::clean($_POST['list-title']);
            $description = Validation::clean($_POST['list-description']);

            $model->addList($author, $title, $description);
            $this->display();
        } else {
            $this->tErrors[] = "Erreur : Problème lors de l'ajout d'une liste privée";
            $this->displayError($this->tErrors);
        }
    }
}