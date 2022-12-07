<?php

class Task
{

    private $id;
    private $content;
    private $idList;

    /**
     * @param $id
     * @param $content
     * @param $idList
     */
    public function __construct($id, $content, $idList)
    {
        $this->id = $id;
        $this->content = $content;
        $this->idList = $idList;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getIdList()
    {
        return $this->idList;
    }

    /**
     * @param mixed $idList
     */
    public function setIdList($idList): void
    {
        $this->idList = $idList;
    }
}