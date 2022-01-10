<?php

require_once 'src/models/Avatar.php';

class AvatarController
{

    public function getAvatar()
    {
        session_start();

        try {
            if (!isset($_SESSION['uid']))
                throw new Exception('Forbidden', 403);

            $userRepository = new UserRepository();
            $avatar = $userRepository->getAvatar($_SESSION['uid']);

            echo $avatar->getPath();

        } catch (Exception $exception) {
            http_response_code($exception->getCode());
            return;
        }
    }


}