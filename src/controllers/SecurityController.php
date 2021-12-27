<?php

require_once './src/repository/UserRepository.php';
require_once "AppController.php";

class SecurityController extends AppController
{

    /**
     * This controller is responsible for logging users into application.
     */
    public function login()
    {
        $userRepository = new UserRepository();

        $email = $_POST['email'];
        $password = $_POST['password'];


        /**
         * Check if email is in the db, if not redirect to login page with appropriate error message.
         */
        try {
            $user = $userRepository->getUser($email);
            $this->areEqualsPasswords($user->getPassword(), password_hash($password, PASSWORD_BCRYPT, array('salt' => $user->getSalt())));
        } catch (Exception $e) {
            $this->render('login', ['message' => $e->getMessage()]);
            exit();
        }


        #FIXME: Ustanowić sesję lub stworzyć ciasteczka.


        $cookie_name = 'uid';
        $cookie_value = '123';
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/'); # Expiration time - one day.

        if(isset($_COOKIE['uid']))
            echo "Cookies are set";


    }

    /**
     * This controller is responsible for registration users into the application.
     */
    public function register()
    {

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];

        # FIXME: Generate salt automatically.
        $salt = '321dsad21321dsad21321dsa2143qdsad13edsad21321dsad213e21dwa';
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT, array('salt' => $salt));
        $passwordConfirmation = password_hash($_POST['passwordConfirmation'], PASSWORD_BCRYPT, array('salt' => $salt));


        /*
         * If something goes wrong user is informed about the errors that occurred.
         * */
        try {
            $this->isUniqueEmail($email);
            $this->areEqualsPasswords($password, $passwordConfirmation);
            $this->isStrongPassword($password);
        } catch (Exception $e) {
            $this->render('register', ['message' => $e->getMessage()]);
            exit();
        }


        $userRepository = new UserRepository();
        $userRepository->saveUser(new User($name, $surname, $email, $password, $salt));

        # When the user is saved to the database then the register template is rendered and the user is asked to confirm an email.
        $this->render('register', ['message' => 'We send email to you. Pleas confirm it..']);
    }


    /**
     * @throws Exception
     */
    private function isUniqueEmail($email)
    {
        $userRepository = new UserRepository();
        if ($userRepository->exists($email))
            throw new Exception('User with given email already exists.');
    }

    /**
     * @throws Exception
     */
    private function areEqualsPasswords($password_1, $password_2)
    {
        if (strcmp($password_1, $password_2))
            throw new Exception("Passwords are not equal.");
    }


    public function isStrongPassword($password)
    {

    }

}




