<?php

class VisitorController
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
                default:
                    $tErrors[] = "Visitor Controller : error action";
                    require($dir . $views['error']);
                    break;
            }
        } catch (PDOException $e) {
            //si error BD, pas le cas ici
            echo $e;
            echo phpinfo();
            $tErrors[] = "Visitor Controller : error database";
            require($dir . $views['error']);
        } catch (Exception $e2) {
            $tErrors[] = "Visitor Controller : unknown error";
            require($dir . $views['error']);
        }
    }

    private function home(): void
    {
        $this->display();
    }

    private function display(): void
    {
        global $dir, $views;

        $model = new VisitorModel();
        $pubLists = $model->getLists();
        $pubTasks = $model->getTasks();

        require($dir . $views['startMainView']);
        require($dir . $views['notConnected']);
        require($dir . $views['endMainView']);
    }

    private function displaySearch(): void
    {
        global $dir, $views;
        $str = Validation::clean($_POST['text']);
        $author = 1;

        $model = new VisitorModel();
        if ($str == "") {
            $pubLists = $model->getLists();
        } else {
            $pubLists = $model->searchList($author, $str);
        }
        $pubTasks = $model->getTasks();

        require($dir . $views['startMainView']);
        require($dir . $views['notConnected']);
        require($dir . $views['endMainView']);
    }

    private function addList(): void
    {
        $model = new VisitorModel();

        $title = Validation::clean($_POST['list-title']);
        $description = Validation::clean($_POST['list-description']);

        $model->addList($title, $description);
        $this->display();
    }

    private function deleteList(): void
    {
        $model = new VisitorModel();

        $id = Validation::clean($_POST['id-list']);

        $model->deleteList($id);
        $this->display();
    }

    private function addTask(): void
    {
        $model = new VisitorModel();

        $idList = Validation::clean($_POST['id-list']);
        $content = Validation::clean($_POST['content']);

        $model->addTask($content, $idList);
        $this->display();
    }

    private function deleteTask(): void
    {
        $model = new VisitorModel();

        $id = Validation::clean($_POST['id-list']);

        $model->deleteTask($id);
        $this->display();
    }

    function validTask(): void
    {
        $model = new VisitorModel();
        $id = Validation::clean($_POST['id-task']);
        $model->validTask($id);
        $this->display();
    }

}//fin class
