<?php
// Inicialização da aplicação
require_once __DIR__ . '/../vendor/autoload.php';

// Carregar variáveis de ambiente se existir
if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
}

// Inicializar a aplicação
$app = new \Core\App();
$app->run();