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
    public function getUserByEmail($email)
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM users WHERE email=:email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == null)
            throw new Exception('User with given email do not exist.');

        return new User(
            $user["name"],
            $user["surname"],
            $user["email"],
            $user["password"],
            $user["id"]
        );

    }

    public function getUserByID($id)
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM users WHERE id=:id');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == null)
            throw new Exception('User with given id do not exist.');

        return new User(
            $user["name"],
            $user["surname"],
            $user["email"],
            $user["password"],
            $user["id"]
        );
    }

    public function uploadUserAvatar($user_id, $name)
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO avatar (name) VALUES (?) RETURNING id;');
        $stmt->execute([
            $name
        ]);

        $avatar_id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

        # TODO: Catch exceptions!!

        $stmt = $this->database->connect()->prepare('INSERT INTO user_avatar (user_id, avatar_id) VALUES (?,?);');
        $stmt->execute([
            $user_id,
            $avatar_id
        ]);
    }
}
