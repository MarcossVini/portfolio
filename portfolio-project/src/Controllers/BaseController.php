<?php

namespace App\Controllers;

class BaseController
{
    protected function render($view, $data = [])
    {
        // Extrair dados para uso no template
        extract($data);
        
        // Capturar o conteúdo para incluir no layout
        ob_start();
        include __DIR__ . "/../Views/{$view}.php";
        $content = ob_get_clean();
        
        // Incluir o layout principal com o conteúdo
        include __DIR__ . "/../Views/layouts/main.php";
    }

    protected function redirect($url)
    {
        header("Location: $url");
        exit();
    }
}