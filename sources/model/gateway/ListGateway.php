<?php

class ListGateway
{
    private Connection $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function getLists($userId): array
    {
        $query = 'SELECT * FROM lists WHERE idAuthor=:userId';
        $this->con->executeQuery($query, array(':userId' => array($userId, PDO::PARAM_STR)));
        return $this->con->getResults();
    }

    public function addList($author, $title, $description): void
    {
        $query = 'INSERT INTO lists (idAuthor,title,description, dateOfCreation) VALUES (:author, :title, :description, :date)';
        $this->con->executeQuery($query, array(
            ':author' => array($author, PDO::PARAM_STR),
            ':title' => array($title, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':date' => array(date('Y-m-d'), PDO::PARAM_STR)));
    }

    public function deleteList($id): void
    {
        $query = 'DELETE FROM lists WHERE id =:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_STR)));
    }
}