<?php

require_once './src/repository/UserRepository.php';
require_once "./src/controllers/AppController.php";
require_once './src/models/User.php';

class LoginController extends AppController
{

    // Login process code:

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userRepository = new UserRepository();

        try {
            $user = $userRepository->getUser($email);
            $this->isValidPassword($password, $user->getPassword());
        } catch (Exception $e) {
            $this->render('login', ['message' => $e->getMessage()]);
            exit();
        }


        $this->setSession($user);
        $this->redirect('', 'get');
    }

    private function setSession($user)
    {
        if (!isset($_SESSION))
            session_start();
        $_SESSION['uid'] = $user->getId();
    }


    /**
     * @throws Exception
     */
    private function isValidPassword($password, $hash)
    {
        if (!password_verify($password, $hash))
            throw new Exception('Password is wrong.');
    }

}