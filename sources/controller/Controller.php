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
	    $action=$_REQUEST['action'];
	    //filtrer action
	    
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
            $tErrors[] = "Erreur inattendue!!! ";
            require($dir . $views['error']);
        } catch (Exception $e2) {
            $tErrors[] = "Erreur inattendue!!! ";
            require($dir . $views['error']);
        }
        //fin
        exit(0);
    }//fin constructeur


    function GoHome()
    {
        global $dir, $views;
        $model = new Model();
        require($dir . $views['home']);
    }
}//fin class

?>
