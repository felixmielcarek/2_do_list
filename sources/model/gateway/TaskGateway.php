<?php

class TaskGateway
{
    private Connection $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function getTasks($userId): array
    {
        $query = 'SELECT tasks.* FROM tasks,lists WHERE tasks.idList=lists.id AND lists.idAuthor=:userId';
        $this->con->executeQuery($query, array(':userId' => array($userId, PDO::PARAM_STR)));
        return $this->con->getResults();
    }

    public function addTask($content, $idList): void
    {
        $query = 'INSERT INTO tasks (content,idList) VALUES (:content, :idList)';
        $this->con->executeQuery($query, array(
            ':content' => array($content, PDO::PARAM_STR),
            ':idList' => array($idList, PDO::PARAM_STR)));
    }

    public function deleteTask($id): void
    {
        $query = 'DELETE FROM tasks WHERE id =:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_STR)));
    }

    public function validTask($id): void
    {
        $query = 'UPDATE tasks SET isDone = NOT isDone WHERE id =:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_STR)));
    }
}