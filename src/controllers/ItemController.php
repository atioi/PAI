<?php

require_once 'src/models/Item.php';

class ItemController
{

    public function getItem()
    {

        $title = $_POST['title'];
        $localization = $_POST['localization'];
        $description = $_POST['description'];

        $item = new Item($title, $localization, $description);






    }
}