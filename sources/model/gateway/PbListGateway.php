<?php

class PbListGateway
{
    private $con;

    /**
     * @param $con
     */
    public function __construct($con)
    {
        $this->con = $con;
    }

    public function getPbLists(): array
    {
        $query = 'SELECT * FROM pblists';
        $this->con->executeQuery($query);
        $res = $this->con->getResults();
        foreach ($res as $row) {
            $tab[] = $row;
        }
        return $tab;
    }


}