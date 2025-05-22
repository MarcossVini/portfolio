<?php
// This file contains helper functions used throughout the application.

function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function redirect($url) {
    header("Location: $url");
    exit();
}

function asset($path) {
    return '/assets/' . ltrim($path, '/');
}

function old($key, $default = '') {
    return $_SESSION['old'][$key] ?? $default;
}

function csrf_token() {
    return $_SESSION['csrf_token'] ?? '';
}

function csrf_field() {
    return '<input type="hidden" name="csrf_token" value="' . csrf_token() . '">';
}
?>