<?php

require_once './src/controllers/AppController.php';
require_once './src/repository/UserRepository.php';

class UploadController extends AppController
{

    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = './public/uploads/avatars/';

    public function portrait()
    {
        if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {

            $name = uniqid();

            # Making the file name unique.
            if ($_FILES['avatar']['type'] == self::SUPPORTED_TYPES[0])
                $name = $name . '.png';

            if ($_FILES['avatar']['type'] == self::SUPPORTED_TYPES[1])
                $name = $name . '.jpg';

            $_FILES['avatar']['name'] = $name;

            $path = self::UPLOAD_DIRECTORY . $_FILES['avatar']['name'];
            move_uploaded_file($_FILES['avatar']['tmp_name'], $path);

            #TODO: Errors handling and checking!
            $userRepository = new UserRepository();
            $userRepository->uploadUserAvatar(1, $name);
        }
    }

}



