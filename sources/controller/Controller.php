<?php

class Controller
{

    function __construct()
    {
        global $rep, $vues;
        // on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
        session_start();
        //debut

        //on initialise un tableau d'erreur
        $dVueEreur = array();

        try {
            $action = $_REQUEST['action'];
            switch ($action) {
                case NULL:
                    $this->GoHome();
                    break;
                case "addPbLists":
                    $this->AddPbLists();
                    break;
                default:
                    $dVueEreur[] = "Erreur d'appel php";
                    require($rep . $vues['vuephp1']);
                    break;
            }
        } catch (PDOException $e) {
            //si erreur BD, pas le cas ici
            $dVueEreur[] = "Erreur inattendue!!! ";
            require($rep . $vues['erreur']);
        } catch (Exception $e2) {
            $dVueEreur[] = "Erreur inattendue!!! ";
            require($rep . $vues['erreur']);
        }
        //fin
        exit(0);
    }//fin constructeur


    function GoHome()
    {
        
        require($rep . $vues['home']);
    }

    function AddPbLists()
    {
        global $rep, $vues; // nécessaire pour utiliser variables globales
        require($rep . $vues['add.php']);
    }
}//fin class

?>
