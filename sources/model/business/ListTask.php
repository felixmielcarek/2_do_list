<?php

class ListTask
{
    private $id;
    private $title;
    private $description;
    private $dateOfCreation;
    private $tasks;
    private $idAuthor;

    /**
     * @param $id
     * @param $idAuthor
     * @param $description
     * @param $title
     * @param $dateOfCreation
     * @param $tasks
     */
    public function __construct($id, $idAuthor, $description, $title, $dateOfCreation, $tasks)
    {
        $this->id = $id;
        $this->idAuthor = $idAuthor;
        $this->description = $description;
        $this->title = $title;
        $this->dateOfCreation = $dateOfCreation;
        $this->tasks = $tasks;
    }

    /**
     * @return mixed
     */
    public function getTasks()
    {
        return $this->tasks;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDateOfCreation()
    {
        return $this->dateOfCreation;
    }

    /**
     * @return mixed
     */
    public function getIdAuthor()
    {
        return $this->idAuthor;
    }


}
