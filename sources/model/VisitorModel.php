<?php

/**
 * Classe modèle pour l'utilisateur
 */
class VisitorModel
{
    /**
     * @param string $id
     * @return array
     *
     * Renvoie les listes d'un utilisateur
     */
    public function getLists(string $id): array
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwL = new ListGateway($con);
        $listsBD = $gwL->getLists($id);
        $listsModel = [];
        foreach ($listsBD as $lId) {
            $listsModel[] = new ListTask($lId['id'], $lId['idAuthor'], $lId['title'], $lId['description'], $lId['dateOfCreation'], null);
        }
        return $listsModel;
    }

    /**
     * @param $id
     * @return array
     *
     * Renvoie les tâches d'un utilisateur
     */
    public function getTasks($id): array
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwT = new TaskGateway($con);
        $tasksBD = $gwT->getTasks($id);
        $tasksModel = [];
        foreach ($tasksBD as $lId) {
            $tasksModel[] = new Task($lId['id'], $lId['content'], $lId['idList'], $lId['isDone']);
        }
        return $tasksModel;
    }

    /**
     * @param $author
     * @param $title
     * @param $description
     * @return void
     *
     * Ajoute une liste pour un utilisateur
     */
    public function addList($author, $title, $description): void
    {
        global $dsn, $user, $pass;
        $con = new Connection($dsn, $user, $pass);
        $gwL = new ListGateway($con);
        $gwL->addList($author, $title, $description);
    }

    /**
     * @param $id
     * @return void
     *
     * Suppression d'une liste
     */
    public function deleteList($id): void
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwL = new ListGateway($con);
        $gwL->deleteList($id);
    }

    /**
     * @param $content
     * @param $idList
     * @return void
     *
     * Ajoute une tâche dans une liste
     */
    public function addTask($content, $idList): void
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwT = new TaskGateway($con);
        $gwT->AddTask($content, $idList);
        return;
    }

    /**
     * @param $id
     * @return void
     *
     * Supprime une tâche
     */
    public function deleteTask($id): void
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwT = new TaskGateway($con);
        $gwT->deleteTask($id);
        return;
    }

    /**
     * @param $id
     * @return void
     *
     * Gestion de la validation d'une tâche
     */
    public function validTask($id): void
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwT = new TaskGateway($con);
        $gwT->validTask($id);
    }

    /**
     * @param $author
     * @param $str
     * @return array
     *
     * Renvoie les listes d'un utilisateur commençant par la chaine de charactères en paramètre
     */
    function searchList($author, $str): array
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwL = new ListGateway($con);
        $listsBD = $gwL->getListsBySearch($author, $str);
        $listsModel = [];
        foreach ($listsBD as $lId) {
            $listsModel[] = new ListTask($lId['id'], $lId['idAuthor'], $lId['title'], $lId['description'], $lId['dateOfCreation'], null);
        }
        return $listsModel;
    }
}
