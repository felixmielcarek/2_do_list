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
}