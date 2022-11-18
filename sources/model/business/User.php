<?php

class User extends Visitor
{
    private $name;
    private $mail;

    /**
     * @param $id
     * @param $name
     * @param $mail
     */
    public function __construct($id, $name, $mail)
    {
        $this->id = $id;
        $this->name = $name;
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

}
