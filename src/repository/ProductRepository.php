<?php

require_once './src/repository/Repository.php';
require_once './src/models/Product.php';

class ProductRepository extends Repository
{

    public function getProductsSample()
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM product');
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];

        foreach ($products as $product) {
            $result[] = new Product(
                $product['title']
            );
        }

        return $result;
    }

    public function getProductsByLocalization()
    {

    }

}