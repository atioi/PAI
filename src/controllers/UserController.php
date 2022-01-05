<?php

require_once './src/controllers/AppController.php';

class UserController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function getAvatar()
    {

        try {
            $this->authorized();
            $path = $this->userRepository->getUserAvatarPath($_SESSION['uid']);

            if (!file_exists($path))
                throw new Exception();

            echo $path;

        } catch
        (Exception $e) {
            http_response_code(404);
            return;
        }

    }

}