<?php

class Product
{

    private $title;

    #FIXME: Object should be more advanced.
    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

}