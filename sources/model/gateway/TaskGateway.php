<?php

class TaskGateway
{
    private Connection $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    /*public function insert():
    {
        $query = "INSERT INTO users (username,mail,password) VALUES (:id,:mail,:password)";
        $this->con->executeQuery($query, array(':id' => array($user->getUsername(), PDO::PARAM_STR), ':mail' => array($user->getMail(), PDO::PARAM_STR), ':password' => array($user->getPassword(), PDO::PARAM_STR)));
    }*/
}