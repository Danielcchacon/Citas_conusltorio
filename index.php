<?php
// Start session
session_start();

// Check if the user is logged in
$login = isset($_SESSION['id_user']);

// Autoload controllers
spl_autoload_register(function ($class_name) {
    include 'controllers/' . $class_name . '.php';
});

// Create the controller instance
$controller = new LoginController();
$action = $_GET['action'] ?? null;

if ($action === 'logout') {
    // Logout user
    $controller->logout();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    // Authenticate user
    $controller->authenticate($_POST);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Authenticate user
    $controller->authenticate($_POST);
    // Update login status after authentication
    $login = isset($_SESSION['id_user']);
}

// Determine which view to load
if ($login) {
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    $view = 'views/admin/' . $page . '.php';
    if (file_exists($view)) {
        include $view;
    } else {
        include 'views/partials/404.php';
    }
} else {
    include 'views/login/login.php';
}
?>



