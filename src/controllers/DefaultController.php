<?php

require_once "AppController.php";
require "./src/repository/ProductRepository.php";
require_once './src/models/Product.php';

class DefaultController extends AppController
{


    public function index()
    {

        session_start();
        echo var_dump($_SESSION);
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

    public function dashboard()
    {
        session_start();
        if (!$_SESSION['uid']) ; # TODO: Render just standard file, in other way user dedicate.

    }


    # For development purposes only. This function redirects the user to the page with information that tells the page is not built yet.
    public function indev()
    {
        $this->render('dev-info');
    }

}

