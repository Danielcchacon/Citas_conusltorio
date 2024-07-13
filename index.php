<?php
session_start();

// Autoload de controladores
spl_autoload_register(function ($class_name) {
    include 'controllers/' . $class_name . '.php';
});

$controller = new LoginController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->authenticate($_POST);
}

$login = isset($_SESSION['login']) ? $_SESSION['login'] : false;

if ($login) {
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    $view = 'views/admin/' . $page . '.php';
    if (file_exists($view)) {
        include $view;
    } else {
        include 'views/partials/404.php';
    }
} else {
    include "views/login/login.php";
}
?>
