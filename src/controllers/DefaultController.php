<?php

require_once "AppController.php";
require "./src/repository/ItemsRepository.php";
require_once './src/models/Item.php';
require_once './src/repository/UserRepository.php';

class DefaultController extends AppController
{


    public function index()
    {
        $this->render('index');
    }

    public function login($message = null)
    {
        $this->render('login', ['message' => $message]);
    }


    public function register()
    {
        $this->render('register');
    }

    public function upload()
    {
        $this->render('upload');
    }


    public function cart()
    {
        $this->render('cart');
    }


    public function settings()
    {
        $this->render('settings');
    }


    # For development purposes only. This function redirects the user to the page with information that tells the page is not built yet.
    public function indev()
    {
        $this->render('dev-info');
    }


}



