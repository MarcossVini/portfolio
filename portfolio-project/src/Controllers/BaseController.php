<?php

namespace App\Controllers;

class BaseController
{
    protected function render($view, $data = [])
    {
        extract($data);
        include "../src/Views/{$view}.php";
    }

    protected function redirect($url)
    {
        header("Location: $url");
        exit();
    }
}