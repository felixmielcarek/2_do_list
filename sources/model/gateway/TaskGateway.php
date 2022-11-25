<?php

class TaskGateway
{
    private Connection $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function getAll()
    {
        $query = "SELECT * FROM TASKS";
        $this->con->executeQuery($query);
    }

    public function getByIdList(int $idList)
    {
        $query = "SELECT * FROM TASKS WHERE idList = :id";
        $this->con->executeQuery($query, array(':id' => array($idList, PDO::PARAM_INT)));
    }

    public function addTask(string $content, int $idList)
    {
        $query = "INSERT INTO TASKS(content,idList) VALUES (:content,:idList)";
        $this->con->executeQuery($query, array(':content' => array($content,PDO::PARAM_STR),':idList' => array($idList,PDO::PARAM_INT)));
    }
}