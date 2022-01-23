<?php

require_once 'Routing.php';

class AppController
{

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
