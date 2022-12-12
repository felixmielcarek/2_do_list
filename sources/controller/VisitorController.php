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
                //TODO : filtrer action
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

    private function addList(): void
    {
        $model = new VisitorModel();

        $author = 1;
        $title = Validation::clean($_POST['title']);
        $description = Validation::clean($_POST['description']);

        $model->addList($author, $title, $description);
        $this->display();
    }

    private function deleteList(): void
    {
        $model = new VisitorModel();

        $id = Validation::clean($_GET['id']);

        $model->deleteList($id);
        $this->display();
    }

    private function addTask(): void
    {
        $model = new VisitorModel();

        $idList = Validation::clean($_POST['idList']);
        $content = Validation::clean($_POST['content']);

        $model->addTask($content, $idList);
        $this->display();
    }

    private function deleteTask(): void
    {
        $model = new VisitorModel();

        $id = Validation::clean($_GET['id']);

        $model->deleteTask($id);
        $this->display();
    }

    function validTask(): void
    {
        $model = new VisitorModel();
        $id = Validation::clean($_GET['id']);
        $model->validTask($id);
        $this->display();
    }
    
}//fin class
