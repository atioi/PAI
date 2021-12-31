<?php

require_once './src/repository/UserRepository.php';
require_once "./src/controllers/AppController.php";
require_once './src/models/User.php';


class RegisterController extends AppController
{

    // Registration process code:

    public function register()
    {

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];

        try {

            $this->arePasswordEqual($password, $password_confirmation);
            $this->isStrongPassword($password);
            $this->isEmailAvailable($email);

        } catch (Exception $e) {
            $this->render('register', ['color' => 'red', 'message' => $e->getMessage()]);
            exit();
        }

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost' => 9));
        $user = new User_($name, $surname, $email, $password);

        $userRepository = new UserRepository();
        $userRepository->save($user);

    }

    /**
     * @throws Exception
     */
    private function arePasswordEqual($password, $password_confirmation)
    {
        if (!$password == $password_confirmation)
            throw new Exception('Passwords do not match.');
    }

    /**
     * @throws Exception
     */
    private function isStrongPassword($password)
    {
        $this->isEnoughLong($password);
        $this->containsAtLeastOneLetter($password);
        $this->containsAtLeastOneNumber($password);
    }

    /**
     * @throws Exception
     */
    private function isEnoughLong($password)
    {
        if (strlen($password) < 8)
            throw new Exception('Password is too short.');
    }

    /**
     * @throws Exception
     */
    private function containsAtLeastOneLetter($password)
    {
        if (!preg_match("#[a-zA-Z]+#", $password))
            throw new Exception('Password should contain at least one letter.');
    }


    /**
     * @throws Exception
     */
    private function containsAtLeastOneNumber($password)
    {
        if (!preg_match("#[0-9]+#", $password))
            throw new Exception('Password should contain at least one number.');
    }


    /**
     * @throws Exception
     */
    private function isEmailAvailable($email)
    {
        $userRepository = new UserRepository();
        if (!$userRepository->isEmailAvailable($email))
            throw new Exception('Email is already in use.');
    }

}