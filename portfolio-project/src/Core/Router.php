<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function addRoute($method, $path, $controller, $action)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action,
        ];
    }

    public function resolve($requestMethod, $requestUri)
    {
        foreach ($this->routes as $route) {
            // Verificar se a rota tem parâmetros (por exemplo {id})
            $pattern = preg_replace('/{([a-zA-Z0-9_]+)}/', '([^\/]+)', $route['path']);
            $pattern = '@^' . $pattern . '$@';
            
            if ($route['method'] === $requestMethod && preg_match($pattern, $requestUri, $matches)) {
                // Remover a primeira correspondência (a string completa)
                array_shift($matches);
                
                return $this->callAction($route['controller'], $route['action'], $matches);
            }
        }

        throw new \Exception('Route not found', 404);
    }

    protected function callAction($controller, $action, $params = [])
    {
        if (!class_exists($controller) || !method_exists($controller, $action)) {
            throw new \Exception('Controller or action not found', 404);
        }

        $controllerInstance = new $controller();
        return call_user_func_array([$controllerInstance, $action], $params);
    }
}