<?php

require_once './src/repository/Repository.php';
require_once './src/models/User.php';

class UserRepository extends Repository
{

    /**
     * @throws Exception
     */
    public function getUser($email)
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM users WHERE email=:email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();


        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        # FIXME: security controller isuniqueemail!
        if ($user == null)
            throw new Exception('Record with the given email was not found.');


        return new User(
            $user["username"],
            $user["surname"],
            $user["email"],
            $user["password"],
            $user["salt"],
            $user["id"]
        );
    }


    public function saveUser($user)
    {

        echo var_dump($user);
        $stmt = $this->database->connect()->prepare('INSERT INTO users (name, surname, email, password,salt) VALUES (?, ?,?,?,?)');
        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getSalt(),
        ]);
    }

    public function exists($email)
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM users WHERE email=:email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == null)
            return false;
        return true;
    }

}
