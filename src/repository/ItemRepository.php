<?php


require_once 'src/repository/Repository.php';
require_once 'src/models/Localization.php';
require_once 'src/models/Item.php';


class ItemRepository extends Repository
{
    public function getItems($limit, $iid = -1)
    {
        $result = [];


        $stmt = $this->prepare('
            SELECT id, title, description, lng, lat, "user" as id_owner
            FROM (SELECT item.id AS id, title, description, lng, lat
                  FROM item
               INNER JOIN localization l on item.localization = l.id) AS items
            INNER JOIN user_item ON item = items.id;  
        ');


        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);


        foreach ($items as $item) {

            $_photos = [];
            $photos = $this->getPhotos($item['id']);
            foreach ($photos as $photo)
                $_photos[] = $photo['path'];

            array_push($result, new Item(
                $item['id'],
                $item['id_owner'],
                $item['title'],
                $item['description'],
                new Localization($item['lng'], $item['lat']),
                $_photos//photos
            ));

        }


        return $result;
    }

    public function getPhotos($iid)
    {
        $stmt = $this->prepare('
            SELECT url as path FROM(SELECT *
            FROM item_photo
            WHERE item =:iid) AS items INNER JOIN photo ON items.photo = photo.id;
        ');

        $stmt->bindParam('iid', $iid);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}