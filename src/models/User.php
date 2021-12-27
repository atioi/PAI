<?php

class User
{
    private $id;
    private $salt;
    private $name;
    private $surname;
    private $email;
    private $password;

    function __construct($name, $surname, $email, $password, $salt = null, $id = null)
    {
        $this->id = $id;
        $this->salt = $salt;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }


    public function getSalt()
    {
        return $this->salt;
    }
}