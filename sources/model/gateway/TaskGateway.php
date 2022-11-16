<?php

class TaskGateway
{
    private Connection $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function getTaskById(int $id): array
    {
        $query = 'SELECT * FROM tasks WHERE id=:id';
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));
        $res = $this->con->getResults();
        return $res[0];
    }
}