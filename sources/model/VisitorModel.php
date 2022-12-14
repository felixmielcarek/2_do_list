<?php

class VisitorModel
{
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

    public function addList($author, $title, $description): void
    {
        global $dsn, $user, $pass;
        $con = new Connection($dsn, $user, $pass);
        $gwL = new ListGateway($con);
        $gwL->addList($author, $title, $description);
    }

    public function deleteList($id): void
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwL = new ListGateway($con);
        $gwL->deleteList($id);
    }

    public function addTask($content, $idList): void
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwT = new TaskGateway($con);
        $gwT->AddTask($content, $idList);
        return;
    }

    public function deleteTask($id): void
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwT = new TaskGateway($con);
        $gwT->deleteTask($id);
        return;
    }

    public function validTask($id): void
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwT = new TaskGateway($con);
        $gwT->validTask($id);
    }

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
