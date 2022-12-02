<?php

class Model
{
    public function GetLists(): array
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwL = new ListGateway($con);
        $listsBD[] = $gwL->GetAll();
        foreach ($listsBD as $lId) {
            $gwT = new TaskGateway($con);
            $tasksBD[] = $gwT->GetByListId($lId[0]);
            foreach ($tasksBD as $t) {
                $tasksModel[] = new Task($t[0], $t[1], $t[2]);
            }
            $listsModel[] = new ListTask($lId[0], $lId[1], $lId[2], $lId[3], $lId[4], $tasksModel);
        }
        return $listsModel;
    }
}
