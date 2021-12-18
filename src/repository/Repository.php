<?php


require_once './Database.php';

class Repository
{
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }


}