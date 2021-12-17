<?php

require "AppController.php";

class DefaultController extends AppController
{
    function index()
    {
        $this->render('index');
    }

    function login()
    {
        $this->render('login');
    }
}