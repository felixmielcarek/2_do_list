<?php

class Task
{
    private $id;
    private $isDone;
    private $content;
    private $title;

    /**
     * @param $id
     * @param $isDone
     * @param $content
     * @param $title
     */
    public function __construct($id, $isDone, $content, $title)
    {
        $this->id = $id;
        $this->isDone = $isDone;
        $this->content = $content;
        $this->title = $title;
    }


}
