<?php


require_once './src/models/User.php';
require_once './src/repository/UserRepository.php';
require_once './src/controllers/AppController.php';

class DashboardController extends AppController
{
    private $USER_ID;

    # Check if user is logged in or not.

    public function __construct()
    {
        $this->USER_ID = $this->getUser();
        $this->isAllowed($this->USER_ID);
    }

    # This function will redirect user when is not logged in.
    private function isAllowed($userID)
    {
        if ($userID == null) {
            header("Location: /login");
            exit();
        }
    }

    function getUser()
    {
        session_start();
        return $_SESSION['uid'];
    }


    # Functions below executes only when user is authorized.


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
            try {
                $userID = $this->getUserID();
                $userRepository->uploadUserAvatar($userID, $name);
            } catch (Exception $e) {

            }

        }
    }


    public function dashboard()
    {
        try {

            $userID = $this->getUserID();
            $userRepository = new UserRepository();
            $user = $userRepository->getUserByID($userID);

            $this->render('dashboard', ['name' => $user->getName(), 'surname' => $user->getSurname()]);

        } catch (Exception $e) {
            $this->redirect('/login', 'get');
        }

    }

    private function getAvatar($userID)
    {
        try {
            $userRepository = new UserRepository();
            $avatar = $userRepository->getUserAvatar($userID);
        } catch (Exception $e) {

        }
    }


    /**
     * @throws Exception
     */
    private
    function getUserID()
    {
        session_start();
        if (isset($_SESSION))
            return $_SESSION['uid'];
        else
            throw new Exception('You are not allowed.');

    }


}