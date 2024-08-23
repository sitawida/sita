// public/index.php
<?php

require_once '../config/config.php';

$url = isset($_GET['url']) ? $_GET['url'] : 'home/index';
$url = rtrim($url, '/');
$url = explode('/', $url);

$controller = ucfirst($url[0]) . 'Controller';
$method = isset($url[1]) ? $url[1] : 'index';

require_once '../app/controllers/' . $controller . '.php';
$controller = new $controller;

if (method_exists($controller, $method)) {
    $controller->$method();
} else {
    echo "Page not found!";
}
?>
