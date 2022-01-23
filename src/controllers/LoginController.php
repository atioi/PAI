<?php

require_once './src/repository/UserRepository.php';
require_once "./src/controllers/AppController.php";
require_once './src/models/User.php';

class LoginController extends AppController
{

    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    # Login:
    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];


        try {
            $user = $this->userRepository->getUserByEmail($email);
            $this->isValidPassword($password, $user->getPassword());
        } catch (Exception $e) {
            $this->render('login', ['message' => $e->getMessage()]);
            exit();
        }
        $avatar = $this->userRepository->getAvatar($user->getId());
        $path = $avatar;


        $this->setSession($user->getId(), $user->getName(), $user->getSurname(), $path);
        header("Location: /");

    }

    private function setSession($id, $name, $surname, $path)
    {
        session_start();

        $_SESSION['uid'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['surname'] = $surname;
        $_SESSION['avatar'] = $path;
    }


    /**
     * @throws Exception
     */
    private function isValidPassword($password, $hash)
    {
        if (!password_verify($password, $hash))
            throw new Exception('Password is wrong.');
    }

    # Logout:
    public function logout()
    {
        $this->endSession();
        header('Location: /');
    }

    private function endSession()
    {
        session_start();
        session_destroy();
    }


}