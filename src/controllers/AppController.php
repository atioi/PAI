<?php

require_once 'Routing.php';

class AppController
{

    protected function startSession($uid)
    {
        session_start();
        $_SESSION['uid'] = $uid;
    }

    protected function endSession()
    {
        unset($_SESSION);
        unset($this->UID);
    }


    /**
     * @throws Exception
     */
    protected function authorized()
    {
        session_start();
        if (!isset($_SESSION['uid']))
            throw new Exception('You are not authorized!');
    }


    protected function render($view = null, array $variables = [])
    {
        $path = './public/views/' . $view . '.php';
        $output = '404';

        if (file_exists($path)) {
            extract($variables);
            ob_start();
            include $path;
            $output = ob_get_clean();
        }

        print $output;
    }


}
