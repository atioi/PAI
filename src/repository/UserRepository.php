<?php

require_once './src/repository/Repository.php';
require_once './src/models/User.php';
require_once './src/models/User.php';


class UserRepository extends Repository
{

    public function save($user)
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO users (name, surname, email, password) VALUES (?,?,?,?)');
        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getEmail(),
            $user->getPassword(),
        ]);
    }

    public function isEmailAvailable($email)
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM users WHERE email=:email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == null)
            return true;
        return false;
    }

    /**
     * @throws Exception
     */
    public function getUser($email)
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM users WHERE email=:email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == null)
            throw new Exception('User with given email do not exist.');

        return new User(
            $user["username"],
            $user["surname"],
            $user["email"],
            $user["password"],
            $user["id"]
        );

    }

}
