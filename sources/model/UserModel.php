<?php

class UserModel
{
    public function login($name, $passwd): ?User
    {
        global $dsn, $user, $pass;
        // TODO : validate fields
        $gw = new UserGateway(new Connection($dsn, $user, $pass));
        $passwdFromDB = $gw->getPasswd($name);
        if ($passwdFromDB == null) {
            return null;
        }
        // TODO : remove and handle hash and password verify
        if ($passwd == $passwdFromDB) {
            $_SESSION['user'] = $name;
            return new User($name);
        }
        if (password_verify($passwd, $passwdFromDB)) {
            $_SESSION['user'] = $name;
            return new User($name);
        }
        return null;
    }

    public function getLists(string $name): array
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwL = new ListGateway($con);
        $listsBD = $gwL->getLists($name);
        $listsModel = [];
        foreach ($listsBD as $lId) {
            $listsModel[] = new ListTask($lId['id'], $lId['idAuthor'], $lId['title'], $lId['description'], $lId['dateOfCreation'], null);
        }
        return $listsModel;
    }

    public function getTasks($name): array
    {
        global $dsn, $user, $pass;

        $con = new Connection($dsn, $user, $pass);
        $gwT = new TaskGateway($con);
        $tasksBD = $gwT->getPrivate($name);
        $tasksModel = [];
        foreach ($tasksBD as $lId) {
            $tasksModel[] = new Task($lId['id'], $lId['content'], $lId['idList'], $lId['isDone']);
        }
        return $tasksModel;
    }
}