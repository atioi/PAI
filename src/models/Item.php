<?php

class Item
{

    private $title;
    private $localization;
    private $description;

    public function __construct($title, $localization, $description)
    {
        $this->title = $title;
        $this->localization = $localization;
        $this->description = $description;
    }
    
    public function getLocalization()
    {
        return $this->localization;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getTitle()
    {
        return $this->title;
    }

}