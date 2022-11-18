<?php

class Task
{

    private $id;
    private $content;
    private $isDone;

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
    public function getIsDone()
    {
        return $this->isDone;
    }

    /**
     * @param $id
     * @param $content
     * @param $isDone
     */
    public function __construct($id, $content, $isDone)
    {
        $this->id = $id;
        $this->content = $content;
        $this->isDone = $isDone;
    }


}
