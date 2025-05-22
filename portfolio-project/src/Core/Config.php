<?php

class Config
{
    private $settings = [];

    public function __construct()
    {
        $this->settings = require __DIR__ . '/../../config/app.php';
    }

    public function get($key)
    {
        return $this->settings[$key] ?? null;
    }
}