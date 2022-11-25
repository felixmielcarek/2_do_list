<?php

class Model
{
    public function GetLists(): array
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $lists = new ListGateway($con) . GetAll();
        foreach ($lists as $lId) {
            $tasksBD = new TaskGateway($con) . GetByListId($lId[0]);
            foreach ($tasksBD as $t) {
                $tasksModel[] = new Task($t[0], $t[1], $t[2]);
            }
            $listsTasks[] = new ListTask($lId[0], $lId[1], $lId[2], $lId[3], $lId[4], $tasksModel);
        }
        return $listsTasks;
    }
}