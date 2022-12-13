<?php

class UserModel
{
    public static function getUserInstance(): ?User
    {
        if (isset($_SESSION['user-id']) && $_SESSION['user-id'] != null && isset($_SESSION['user-name']) && $_SESSION['user-name'] != null) {
            $id = Validation::clean($_SESSION['user-id']);
            $name = Validation::clean($_SESSION['user-name']);
            return new User($id, $name);
        } else return null;
    }

    public function login($name, $passwd): ?User
    {
        global $dsn, $user, $pass;
        // TODO : validate fields
        $gw = new UserGateway(new Connection($dsn, $user, $pass));
        $passwdFromDB = $gw->getPasswd($name);
        if ($passwdFromDB == null) {
            return null;
        }
        if (password_verify($passwd, $passwdFromDB)) {
            $id = $gw->getId($name);
            $_SESSION['user-id'] = $id;
            $_SESSION['user-name'] = $name;
            return new User($id, $name);
        }
        return null;
    }

    public function logout(): void
    {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

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

    public function addPvList($author, $title, $description): void
    {
        global $dsn, $user, $pass;
        $con = new Connection($dsn, $user, $pass);
        $gwL = new ListGateway($con);
        $gwL->addList($author, $title, $description);
    }
}