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
            $listsModel[] = new ListTask($lId[0], $lId[1], $lId[2], $lId[3], $lId[4], null);
        }
        return $listsModel;
    }
}
