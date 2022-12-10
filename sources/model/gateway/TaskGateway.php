<?php

class TaskGateway
{
    private Connection $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function GetAll(): array
    {
        $query = 'SELECT * FROM tasks';
        $this->con->executeQuery($query);
        return $this->con->getResults();
    }

    public function addTask($content, $idList)
    {
        $query = 'INSERT INTO tasks (content,idList) VALUES (:content, :idList)';
        $this->con->executeQuery($query, array(
            ':content' => array($content, PDO::PARAM_STR),
            ':idList' => array($idList, PDO::PARAM_STR)));


    }

    public function DeleteTask($id)
    {
        $query = 'DELETE FROM tasks WHERE id =:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_STR)));


    }

    public function ValidTask($id)
    {
        $query = 'UPDATE tasks SET isDone = NOT isDone WHERE id =:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_STR)));
    }
}