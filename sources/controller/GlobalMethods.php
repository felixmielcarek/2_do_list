<?php

/**
 * Classes possédant les méthodes pouvant être appelé à la fois par un Visitor et par un User
 */
abstract class GlobalMethods
{
    public array $tErrors = array();

    /**
     * @return void
     *
     * Affichage des listes publiques recherchées
     */
    abstract function displaySearch(): void;

    /**
     * @return void
     *
     * Ajout d'une liste publique
     */
    protected function addList(): void
    {
        $model = new VisitorModel();

        $title = Validation::clean($_POST['list-title']);
        $description = Validation::clean($_POST['list-description']);

        $model->addList(0, $title, $description);
        $this->display();
    }

    /**
     * @return void
     *
     * Affichage principal qui doit être réécrit par le controller User
     */
    protected function display($rightPage = 'notConnected'): void
    {
        global $dir, $views;
        $vm = new VisitorModel();
        $pubLists = $vm->getLists(0);
        $pubTasks = $vm->getTasks(0);
        require($dir . $views['startMainView']);
        require($dir . $views[$rightPage]);
        require($dir . $views['endMainView']);
    }

    protected function displayPrivate(): void
    {
        global $dir, $views;
        $user = UserModel::getUserInstance();
        $vm = new VisitorModel();
        $id = $user->getId();
        $pubLists = $vm->getLists(0);
        $pubTasks = $vm->getTasks(0);
        $pvLists = $vm->getLists($id);
        $pvTasks = $vm->getTasks($id);
        require($dir . $views['startMainView']);
        require($dir . $views['privateLists']);
        require($dir . $views['endMainView']);
    }

    /**
     * @return void
     *
     * Suppression d'une liste
     */
    protected function deleteList(): void
    {
        $model = new VisitorModel();

        $id = Validation::clean($_POST['id-list']);

        $model->deleteList($id);
        $this->display();
    }

    /**
     * @return void
     *
     * Ajout d'une tâche
     */
    protected function addTask(): void
    {
        $model = new VisitorModel();

        $idList = Validation::clean($_POST['id-list']);
        $content = Validation::clean($_POST['content']);

        $model->addTask($content, $idList);
        $this->display();
    }

    /**
     * @return void
     *
     * Suppression d'une tâche
     */
    protected function deleteTask(): void
    {
        $model = new VisitorModel();

        $id = Validation::clean($_POST['id-list']);

        $model->deleteTask($id);
        $this->display();
    }

    /**
     * @return void
     *
     * Validation d'une tâche
     */
    protected function validTask(): void
    {
        $model = new VisitorModel();
        $id = Validation::clean($_POST['id-task']);

        $model->validTask($id);
        $this->display();
    }

    /**
     * @return void
     *
     * Affiche la page d'erreur
     */
    protected function displayError($tErrors): void
    {
        global $dir, $views;
        require($dir . $views['error']);
    }
}