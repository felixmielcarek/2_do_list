<?php

class VisitorController extends CanDisplay
{
    function __construct()
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
                    $this->notConnected();
                    break;
                case "addList":
                    $this->addList();
                    break;
                case "deleteList":
                    $this->deleteList();
                    break;
                case "deleteTask":
                    $this->deleteTask();
                    break;
                case "addTask":
                    $this->addTask();
                    break;
                case "connection":
                    $this->connection();
                    break;
                case "validTask":
                    $this->validTask();
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

    private function notConnected()
    {
        $this->displayHome('notConnected');
    }

    private function addList()
    {
        $model = new VisitorModel();

        $author = 1;
        $title = $_POST['title'];
        $description = $_POST['description'];

        $model->Addlist($author, $title, $description);
        $this->displayHome('notConnected');
    }

    private function deleteList()
    {
        $model = new VisitorModel();

        $id = $_GET['id'];

        $model->DeleteList($id);
        $this->displayHome('notConnected');
    }

    private function deleteTask()
    {
        $model = new VisitorModel();

        $id = $_GET['id'];

        $model->DeleteTask($id);
        $this->displayHome('notConnected');
    }

    private function addTask()
    {
        $model = new VisitorModel();

        $idList = $_POST['idList'];
        $content = $_POST['content'];

        $model->AddTask($content, $idList);
        $this->displayHome('notConnected');
    }

    private function connection()
    {
        $model = new VisitorModel();

        $model->connection();
        $this->displayHome('connection');
    }

    function validTask()
    {
        global $dir, $views;
        $model = new Model();
        $id = $_GET['id'];
        $model->ValidTask($id);
        $this->GoHome();
    }

    function rand_color(): string
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
}//fin class
