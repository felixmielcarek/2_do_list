<?php

class ListGateway
{
    private Connection $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function GetPublic()
    {

    }
}