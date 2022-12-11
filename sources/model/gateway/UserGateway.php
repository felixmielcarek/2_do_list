<?php

class UserGateway
{
    private Connection $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function getPasswd(string $name): ?string
    {
        $query = 'SELECT passwd FROM users WHERE name = :name';
        $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR)));
        $res = $this->con->getResults();
        if (count($res) != 1) {
            return null;
        } else {
            return $res[0][0];
        }
    }
}