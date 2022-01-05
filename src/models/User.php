<?php

require_once './src/const/DefaultAvatars.php';


class User
{
    private $name;
    private $surname;
    private $email;
    private $password;
    private $id;
    private $avatar;

    public function __construct($name, $surname, $email, $password, $id = null)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->id = $id;
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
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

}



