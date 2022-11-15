<?php

class User
{
    private $username;
    private $password;
    private $mail;
    private $listTask;

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @param $username
     * @param $password
     * @param $mail
     */
    public function __construct($username, $password, $mail)
    {
        $this->username = $username;
        $this->password = $password;
        $this->mail = $mail;
        $this->listTask = [];
    }


}
