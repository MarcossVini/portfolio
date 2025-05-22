<?php

namespace Core;

class App
{
    protected $router;

    public function __construct()
    {
        // Inicializar o roteador
        $this->router = new Router();
        
        // Registrar as rotas
        $this->registerRoutes();
    }

    public function run()
    {
        try {
            $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $method = $_SERVER['REQUEST_METHOD'];
            $this->router->resolve($method, $path);
        } catch (\Exception $e) {
            // Lidar com erros
            http_response_code($e->getCode() ?: 500);
            echo $e->getMessage();
        }
    }
    
    protected function registerRoutes()
    {
        // Rotas para projetos
        $this->router->addRoute('GET', '/', 'App\Controllers\HomeController', 'index');
        $this->router->addRoute('GET', '/projects', 'App\Controllers\ProjectController', 'index');
        $this->router->addRoute('GET', '/projects/create', 'App\Controllers\ProjectController', 'create');
        $this->router->addRoute('POST', '/projects', 'App\Controllers\ProjectController', 'store');
        $this->router->addRoute('GET', '/projects/{id}', 'App\Controllers\ProjectController', 'show');
    }
}