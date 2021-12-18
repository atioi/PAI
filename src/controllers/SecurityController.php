<?php

require_once './src/repository/UserRepository.php';

class SecurityController
{

    /**
     * This controller is responsible for logging users into application.
     */
    public function login()
    {
        $userRepository = new UserRepository();

        $email = $_POST['email'];
        $password = $_POST['password'];

        try {

            $user = $userRepository->getUser($email);
            echo $user->getPassword();
            #TODO: Compare given password with password retrieved from database.


        } catch (Exception $exception) {
            //TODO: Show message the user.
            echo $exception->getMessage();
        }

    }

    /**
     * This controller is responsible for registration users into the application.
     */
    public function register()
    {

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConfirmation = $_POST['passwordConfirmation'];

        #DONE TODO: Check if email not exists in the database.
        #DONE TODO: Check if password is strong and is equal to passwordConfirmation.


        try {
            #FIXME: After saving user to database can occur error... and I will be not able to catch it. Maybe adding new types of Exception will help.


            $this->isStrongPassword($password);
            $this->isValidEmail($email);
            $this->isUniqueEmail($email);
            $this->areEqualsPasswords($password, $passwordConfirmation);

            $user = new User($name, $surname, $email, $password);

            $userRepository = new UserRepository();
            $userRepository->saveUser($user);

        } catch (Exception $e) {
            # Each exception should be displayed to user to let them understand what they are doing wrong.
            echo $e->getMessage();

        }

    }

    /**
     * @throws Exception
     */
    private function isValidEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            throw new Exception("Email is not valid");

    }

    /**
     * @throws Exception
     */
    private function isUniqueEmail($email)
    {
        $userRepository = new UserRepository();
        $user = $userRepository->getUser($email);
        if ($user)
            throw new Exception("Email already in use.");
    }

    /**
     * @throws Exception
     */
    private function areEqualsPasswords($password_1, $password_2)
    {
        if (strcmp($password_1, $password_2))
            throw new Exception("Passwords are not equal.");
    }

    /**
     * Checks if given password is strong.
     * @throws Exception
     */
    private function isStrongPassword($password)
    {
        if (strlen($password) < 8)
            throw new Exception("Password is too short.");

        if (!preg_match("#[0-9]+#", $password))
            throw new Exception("Password must include at least one number.");

        if (!preg_match("#[a-zA-Z]+#", $password))
            throw new Exception("Password must include at least one letter.");

    }


}




