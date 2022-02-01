<?php

require_once "AppController.php";
require_once './src/repository/UserRepository.php';

class ViewsController extends AppController
{

    # Root view:
    public function index()
    {
        session_start();
        if (!isset($_SESSION['uid']))
            $this->render('index');
        else {

            $avatar = $_SESSION['avatar'];
            $this->render('index', ['avatar' => $avatar]);
        }

    }

    # Public views:

    public function login()
    {
        session_start();
        if (!isset($_SESSION['uid']))
            $this->render('login');
        else
            header('Location: /dashboard');
    }

    # Secured views:

    public function dashboard()
    {
        session_start();
        if (!isset($_SESSION['uid']))
            header('Location: /login');

        $uid = $_SESSION['uid'];
        $name = $_SESSION['name'];
        $surname = $_SESSION['surname'];
        $avatar = $_SESSION['avatar'];

        $this->render('dashboard', [
            'name' => $name,
            'surname' => $surname,
            'avatar' => $avatar
        ]);

    }

    public function settings()
    {
        $this->render('settings');
    }

    public function cart()
    {
        $this->render('cart');
    }

    public function upload()
    {
        $this->render('upload');
    }

    public function register()
    {
        $this->render('register');
    }

}