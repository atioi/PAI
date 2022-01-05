<?php


require_once './src/models/User.php';
require_once './src/repository/UserRepository.php';
require_once './src/controllers/AppController.php';

class DashboardController extends AppController
{
    private $USER_ID;
    private $userRepository;

    # Check if user is logged in or not.

    public function __construct()
    {
        $this->USER_ID = $this->getUser();
        $this->isAllowed($this->USER_ID);
        $this->userRepository = new UserRepository();
    }

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


    # This function will redirect user when is not logged in.

    public function dashboard()
    {
        try {
            $user = $this->userRepository->getUserByID($this->USER_ID);
            $this->render('dashboard', ['name' => $user->getName(), 'surname' => $user->getSurname()]);

        } catch (Exception $e) {
            $this->redirect('/login', 'get');
        }
    }

// Function gets avatar from server and sends to the user.

    public function get_avatar()
    {

        try {

            $output = '404';

            $path = $this->userRepository->getUserAvatarPath($this->USER_ID);
            if (file_exists($path)) {
                ob_start();
                include $path;
                $output = ob_get_clean();
            }
            print $output;

        } catch (Exception $e) {
            print '404';
        }

    }


// Here is avatar uploading logic.

    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = 'public/uploads/avatars/user/';

    public function upload_avatar()
    {
        try {
            $this->isUploaded($_FILES['avatar']['tmp_name']);
            $this->set_avatar_unique_name($_FILES['avatar']);

            $destination = self::UPLOAD_DIRECTORY . $_FILES['avatar']['name'];
            move_uploaded_file($_FILES['avatar']['tmp_name'], $destination);

            $previous_avatar_path = $this->userRepository->getUserAvatarPath($this->USER_ID);
            unlink($previous_avatar_path);

            $this->userRepository->uploadAvatar($this->USER_ID, $destination);


        } catch (Exception $e) {
            exit();
        }
    }

    private function set_avatar_unique_name(&$avatar)
    {
        if ($avatar['type'] == 'image/png')
            $avatar['name'] = uniqid() . '.png';

        if ($avatar['type'] == 'image/jpeg')
            $avatar['name'] = uniqid() . '.jpg';
    }

    /**
     * @throws Exception
     */
    private function isUploaded($path)
    {
        if (!is_uploaded_file($path))
            throw new Exception('File is not uploaded');
    }


}

