<?php


require_once "AppController.php";
require "./src/repository/ProductRepository.php";
require_once './src/models/Product.php';

class AuthorizedController extends AppController
{


    private function isAuthorized()
    {
        return isset($_COOKIE);
    }


    public function dashboard()
    {

    }




}

