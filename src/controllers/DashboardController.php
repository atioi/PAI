<?php


require_once './src/models/User.php';
require_once './src/repository/UserRepository.php';
require_once './src/controllers/AppController.php';

class DashboardController extends AppController
{


    public function dashboard()
    {
        session_start();
        try {
            if (!isset($_SESSION['uid']))
                throw new Exception('Forbidden', 403);

            $userRepository = new UserRepository();
            $user = $userRepository->getUserByID($_SESSION['uid']);
            $this->render('dashboard', ['name' => $user->getName(), 'surname' => $user->getSurname()]);

        } catch (Exception $exception) {
            header("Location: /login");
        }

    }

}




