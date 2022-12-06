<?php

class ListGateway
{
    private Connection $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function GetAll(): array
    {
        $query = 'SELECT * FROM lists';
        $this->con->executeQuery($query);
        return $this->con->getResults();
    }

    public function AddList($author, $title, $description): array
    {
        $query = 'INSERT INTO lists (iAuthor,title,description, dateOfCreation) VALUES (:author, :title, :description, :date)';
        $this->con->executeQuery($query, array(
            ':author'=>array($author, PDO::PARAM_STR),
            ':title'=>array($title, PDO::PARAM_STR),
            ':description'=>array($description, PDO::PARAM_STR),
            ':date'=>array(date('Y-m-d'), PDO::PARAM_STR)));

        return $this->con->getResults();
    }
}