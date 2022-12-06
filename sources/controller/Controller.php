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
        require($dir . $views['home']);
    }
}//fin class

?>
