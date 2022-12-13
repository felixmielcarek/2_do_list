<?php

abstract class GlobalMethods
{
    protected function addList(): void
    {
        $model = new VisitorModel();

        $title = Validation::clean($_POST['list-title']);
        $description = Validation::clean($_POST['list-description']);

        $model->addList($title, $description);
        $this->display();
    }

    abstract function display();

    protected function deleteList(): void
    {
        $model = new VisitorModel();

        $id = Validation::clean($_POST['id-list']);

        $model->deleteList($id);
        $this->display();
    }

    protected function addTask(): void
    {
        $model = new VisitorModel();

        $idList = Validation::clean($_POST['id-list']);
        $content = Validation::clean($_POST['content']);

        $model->addTask($content, $idList);
        $this->display();
    }

    protected function deleteTask(): void
    {
        $model = new VisitorModel();

        $id = Validation::clean($_POST['id-list']);

        $model->deleteTask($id);
        $this->display();
    }

    protected function validTask(): void
    {
        $model = new VisitorModel();
        $id = Validation::clean($_POST['id-task']);

        $model->validTask($id);
        $this->display();
    }

    protected function displaySearch(): void
    {
        global $dir, $views;

        $str = Validation::clean($_POST['list-title']);

        $model = new VisitorModel();
        if ($str == "") {
            $this->display();
        } else {
            $pubLists = $model->searchList(0, $str);
            $pubTasks = $model->getTasks();

            require($dir . $views['startMainView']);
            require($dir . $views['notConnected']);
            require($dir . $views['endMainView']);
        }
    }
}