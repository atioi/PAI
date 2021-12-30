<?php

require_once "AppController.php";
require "./src/repository/ProductRepository.php";
require_once './src/models/Product.php';

class DefaultController extends AppController
{

    public function index()
    {
        # TODO: Jeżeli ciasteczka są ustawione to pobieramy użytkownia z tymi ciasteczkami. W przeciwnym razie wyświetlamy normalny panel.
        $productRepository = new ProductRepository();
        $products = $productRepository->getProductsSample();
        $this->render('index', ['products' => $products]);

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

    public function indev()
    {
        $this->render('dev-info');
    }

}

