<?php

/**
 * Gateway pour les listes (publiques et privées)
 */
class ListGateway
{
    private Connection $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    /**
     * @param $userId
     * @return array
     *
     * Renvoie les listes d'un utilisateur
     */
    public function getLists($userId): array
    {
        $query = 'SELECT * FROM lists WHERE idAuthor=:userId';
        $this->con->executeQuery($query, array(':userId' => array($userId, PDO::PARAM_STR)));
        return $this->con->getResults();
    }

    /**
     * @param $author
     * @param $title
     * @param $description
     * @return void
     *
     * Ajout d'une liste par un utilisateur
     */
    public function addList($author, $title, $description): void
    {
        $query = 'INSERT INTO lists (idAuthor,title,description, dateOfCreation) VALUES (:author, :title, :description, :date)';
        $this->con->executeQuery($query, array(
            ':author' => array($author, PDO::PARAM_STR),
            ':title' => array($title, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':date' => array(date('Y-m-d'), PDO::PARAM_STR)));
    }

    /**
     * @param $id
     * @return void
     *
     * Suppression d'une liste
     */
    public function deleteList($id): void
    {
        $query = 'DELETE FROM lists WHERE id =:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_STR)));
    }

    /**
     * @param $userId
     * @param $str
     * @return array
     *
     * Renvoie les listes d'un utilisateur commençant par la chaine de charactères en paramètre
     */
    public function getListsBySearch($userId, $str): array
    {
        $query = "SELECT * FROM lists WHERE idAuthor=:userId AND title LIKE '$str%'";
        $this->con->executeQuery($query, array(
            ':userId' => array($userId, PDO::PARAM_STR)));
        return $this->con->getResults();
    }
}