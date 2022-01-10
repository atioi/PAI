<?php

require_once './src/repository/Repository.php';
require_once './src/models/User.php';
require_once './src/models/Avatar.php';


class UserRepository extends Repository
{

    public function save($user)
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO users (name, surname, email, password) VALUES (?,?,?,?);');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getEmail(),
            $user->getPassword(),
        ]);

    }


    public function isEmailAvailable($email)
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM users WHERE email=:email ;');
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


    /**
     * DON'T TOUCH!
     * @return User
     * @throws Exception
     */
    public function getUserByID($id)
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM users WHERE id=:id');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == null)
            throw new Exception('Not Found', 404);

        return new User(
            $user["name"],
            $user["surname"],
            $user["email"],
            $user["password"],
            $user["id"]
        );
    }


    /**
     * DON'T TOUCH!
     * Retrieves user avatar path from db.
     * @return Avatar
     * @throws Exception with code 404 Not Found
     */
    public function getAvatar($uid)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT *
        FROM (SELECT *
              FROM user_avatar
                       INNER JOIN avatar a on a.id = user_avatar.avatar_id) AS user_avatar_path
        WHERE user_avatar_path.user_id =:uid;
        ');
        $stmt->bindParam(':uid', $uid, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!isset($result))
            throw new Exception('Not Found', 404);

        return new Avatar($result['path']);
    }

}


