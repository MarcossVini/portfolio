<?php

namespace Core;

class App
{
    protected $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run()
    {
        $this->router->dispatch($_SERVER['REQUEST_URI']);
    }
}