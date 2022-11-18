<?php

class UserGateway
{

    private Connection $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function getAll()
    {
        $query = "SELECT * FROM users";
        $this->con->executeQuery($query);
    }

}