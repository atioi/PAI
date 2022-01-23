<?php

require_once 'src/models/Item.php';
require_once 'src/controllers/AppController.php';
require_once 'src/repository/ItemRepository.php';


class ItemController extends AppController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ItemRepository();
    }


    public function items()
    {
        $items = $this->repository->getItems(30);
        $result = [];

        foreach ($items as $item)
            array_push($result, $item->map());

        echo json_encode($result);
    }

    public function item($iid)
    {

    }


}