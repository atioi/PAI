<?php

require_once './src/repository/Repository.php';
require_once './src/models/User.php';

class UserRepository extends Repository
{

    public function getUser($email)
    {

        $stmt = $this->database->connect()->prepare('SELECT * FROM users WHERE email=:email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();


        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        #FIXME: Create Exception but first find out how to enhance isEmailUnique method in SecurityController.
        if ($user == null)
            return null;

        return new User(
            $user["username"],
            $user["surname"],
            $user["email"],
            $user["password"]
        );

    }


    public function saveUser($user)
    {
        #TODO: Allow to save user to database.

    }

}
