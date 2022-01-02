<?php

require_once "AppController.php";
require "./src/repository/ProductRepository.php";
require_once './src/models/Product.php';

class DefaultController extends AppController
{


    public function index()
    {
        session_start();
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
        $this->render('uploads');
    }

    public function dashboard()
    {
        
        session_start();
        if ($_SESSION['uid'] != null) {
            $userRepository = new UserRepository();
            try {
                $user = $userRepository->getUserByID($_SESSION['uid']);
                $this->render('dashboard', ['name' => $user->getName(), 'surname' => $user->getSurname()]);
            } catch (Exception $e) {

            }
        }

    }


    # For development purposes only. This function redirects the user to the page with information that tells the page is not built yet.
    public function indev()
    {
        $this->render('dev-info');
    }

}

