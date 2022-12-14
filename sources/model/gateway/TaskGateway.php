<?php

/**
 * Gateway pour les tâches
 */
class TaskGateway
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
     * Renvoie les tâches d'un utilisateur
     */
    public function getTasks($userId): array
    {
        $query = 'SELECT tasks.* FROM tasks,lists WHERE tasks.idList=lists.id AND lists.idAuthor=:userId';
        $this->con->executeQuery($query, array(':userId' => array($userId, PDO::PARAM_STR)));
        return $this->con->getResults();
    }

    /**
     * @param $content
     * @param $idList
     * @return void
     *
     * Ajout d'une tâche dans une liste
     */
    public function addTask($content, $idList): void
    {
        $query = 'INSERT INTO tasks (content,idList) VALUES (:content, :idList)';
        $this->con->executeQuery($query, array(
            ':content' => array($content, PDO::PARAM_STR),
            ':idList' => array($idList, PDO::PARAM_STR)));
    }

    /**
     * @param $id
     * @return void
     *
     * Supprime une tâche
     */
    public function deleteTask($id): void
    {
        $query = 'DELETE FROM tasks WHERE id =:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_STR)));
    }

    /**
     * @param $id
     * @return void
     *
     * Valide une tâche
     */
    public function validTask($id): void
    {
        $query = 'UPDATE tasks SET isDone = NOT isDone WHERE id =:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_STR)));
    }
}