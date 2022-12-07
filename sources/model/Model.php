<?php

class Model
{
    public function GetLists(): array
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwL = new ListGateway($con);
        $listsBD = $gwL->GetAll();

        foreach ($listsBD as $lId) {
            $listsModel[] = new ListTask($lId['id'], $lId['idAuthor'], $lId['title'], $lId['description'], $lId['dateOfCreation'], null);
        }
        return $listsModel;
    }

    public function Addlist($author, $title, $description): void
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwL = new ListGateway($con);
        $listsBD = $gwL->AddList($author, $title, $description);
        return;
    }

    public function DeleteList($id): void
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwL = new ListGateway($con);
        $listsBD = $gwL->DeleteList($id);
        return;
    }
}
