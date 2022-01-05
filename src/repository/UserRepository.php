<?php

require_once './src/repository/Repository.php';
require_once './src/models/User.php';
require_once './src/models/User.php';


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

    public function getUserByID($id)
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM users WHERE id=:id');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == null)
            throw new Exception('User with given id do not exist.');

        try {
            $avatar = $this->getUserAvatarPath($user['id']);
        } catch (Exception $e) {

        }

        return new User(
            $user["name"],
            $user["surname"],
            $user["email"],
            $user["password"],
            $avatar,
            $user["id"]
        );
    }


    /**
     * @throws Exception
     */
    public function getUserAvatarPath($uid)
    {


        $stmt = $this->
        database->
        connect()->
        prepare("
            SELECT path 
            FROM avatar as avatar_
                INNER JOIN user_avatar as user_avatar_ ON avatar_.id = user_avatar_.avatar_id
            WHERE user_avatar_.user_id =:user_id;
        ");
        $stmt->bindParam(':user_id', $uid, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result == null)
            throw new Exception('Cannot find user avatar');

        return $result['path'];

    }


    private function removeAvatar($user_id)
    {
        $stmt = $this->database->connect()->prepare(
            'DELETE
                    FROM avatar
                        WHERE avatar.id = (SELECT *
                               FROM (SELECT avatar_id
                                     FROM user_avatar
                                     WHERE user_avatar.user_id=:user_id) AS tab);
            ');


        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();

    }

    private function removeConnectionBetweenUserAndAvatar($user_id)
    {

        $stmt = $this->database->connect()->prepare(
            '
                DELETE
                    FROM user_avatar
                    WHERE user_id=:user_id;
            ');

        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();
    }

    private function uploadUserAvatar($user_id, $path)
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO avatar (path) VALUES (?) RETURNING id;');
        $stmt->execute([
            $path
        ]);

        $avatar_id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

        $stmt = $this->database->connect()->prepare('INSERT INTO user_avatar (user_id, avatar_id) VALUES (?,?);');
        $stmt->execute([
            $user_id,
            $avatar_id
        ]);
    }

    public function uploadAvatar($user_id, $path)
    {
        $this->removeAvatar($user_id);
        $this->removeConnectionBetweenUserAndAvatar($user_id);
        $this->uploadUserAvatar($user_id, $path);
    }

}
