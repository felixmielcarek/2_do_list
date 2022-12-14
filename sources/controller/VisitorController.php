<?php

class VisitorController extends GlobalMethods
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
    }

    private function home(): void
    {
        $this->display();
    }

    public function display(): void
    {
        global $dir, $views;

        $model = new VisitorModel();
        $pubLists = $model->getLists(0);
        $pubTasks = $model->getTasks(0);

        require($dir . $views['startMainView']);
        require($dir . $views['notConnected']);
        require($dir . $views['endMainView']);
    }

}//fin class
