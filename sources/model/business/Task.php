<?php

class Task
{

    private $id;
    private $content;
    private $idList;
    private $isDone;


    /**
     * @param $id
     * @param $content
     * @param $idList
     */
    public function __construct($id, $content, $idList, $isDone)
    {
        $this->id = $id;
        $this->content = $content;
        $this->idList = $idList;
        $this->isDone = $isDone;
    }

    /**
     * @return mixed
     */
    public function getIsDone()
    {
        return $this->isDone;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getIdList()
    {
        return $this->idList;
    }
}