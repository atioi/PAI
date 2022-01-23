<?php

require 'src/models/Localization.php';

class Item
{

    private $id;
    private $owner;
    private $title;
    private $localization;
    private $photos;
    private $description;

    public function __construct($id, $owner, $title, $description, $localization, $photos)
    {
        $this->id = $id;
        $this->owner = $owner;
        $this->title = $title;
        $this->description = $description;
        $this->localization = $localization;
        $this->photos = $photos;
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
    public function getOwner()
    {
        return $this->owner;
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
    public function getLocalization()
    {
        return $this->localization;
    }

    /**
     * @return mixed
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    public function map()
    {
        return [
            'id' => $this->id,
            'owner' => $this->owner,
            'title' => $this->title,
            'localization' => [
                'lng' => $this->localization->getLatitude(),
                'lat' => $this->localization->getLongitude()
            ],
            'photos' => $this->photos];
    }

}
