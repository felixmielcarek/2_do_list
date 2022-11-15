<?php

class UserGateway{

    private Connection $con;

    public function __construct(Connection $con){
        $this->con = $con;}

    public function insert(User $user): int{
        $query = "INSERT INTO users (username,mail,password) VALUES (:id,:mail,:password)";
        $this->con->executeQuery($query, array(':id' => array($user->getUsername(),PDO::PARAM_STR),':mail' => array($user->getMail(),PDO::PARAM_STR),':password' => array($user->getPassword(),PDO::PARAM_STR)));
        return $this->con->lastInsertId();
    }

    public function delete(User $user): void{
        $query = "DELETE FROM users WHERE mail= :mail AND password= :password";
        $this->con->executeQuery($query, array(':mail' => array($user->getMail(),PDO::PARAM_STR),':password' => array($user->getPassword(),PDO::PARAM_STR)));
    }

    public function select(): void{
        $query = "SELECT * FROM users";
        $this->con->executeQuery($query);
    }

}