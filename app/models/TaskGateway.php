<?php

class TaskGateway
{
    private Connection $con;

    public function __construct(Connection $con){
        $this->con = $con;}

}