<?php

class Controller
{

    function __construct()
    {
        global $dir, $views;
        // on démarre ou dirrend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
        session_start();

        //on initialise un tableau d'error
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
                    $this->GoHome();
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
        //fin
        exit(0);
    }//fin constructeur


    function GoHome()
    {
        global $dir, $views;
        $model = new Model();
        $pubLists = $model->GetLists();
        $pubTasks = $model->GetTasks();
        require($dir . $views['home']);
    }

    function addList()
    {
        global $dir, $views;
        $model = new Model();
        $author = 1;
        $title = $_POST['title'];
        $description = $_POST['description'];
        $pubLists = $model->Addlist($author, $title, $description);
        $this->GoHome();
    }

    function deleteList()
    {
        global $dir, $views;
        $model = new Model();
        $author = 1;
        $id = $_GET['id'];
        $pubLists = $model->DeleteList($id);
        $this->GoHome();
    }

    function deleteTask()
    {
        global $dir, $views;
        $model = new Model();
        $author = 1;
        $id = $_GET['id'];
        $model->DeleteTask($id);
        $this->GoHome();
    }

    function addTask()
    {
        global $dir, $views;
        $model = new Model();
        $idList = $_POST['idList'];
        $content = $_POST['content'];
        $model->AddTask($content, $idList);
        $this->GoHome();
    }

    function validTask()
    {
        global $dir, $views;
        $model = new Model();
        $id = $_GET['id'];
        $model->ValidTask($id);
        $this->GoHome();
    }

    function rand_color()
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }


}//fin class

?>
