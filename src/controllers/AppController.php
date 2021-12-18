<?php

class AppController
{
    protected function render($view = null)
    {
        $path = './public/views/' . $view . '.php';
        $output = '404';

        if (file_exists($path)) {
            ob_start();
            include $path;
            $output = ob_get_clean();
        }

        print $output;
    }

}
