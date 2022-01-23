<?php


require_once './Database.php';

class Repository
{
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }


    protected function prepare($query)
    {
        return $this->database->connect()->prepare($query);
    }

}