<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$view = 'views/admin/' . $page . '.php';
if (file_exists($view)) {
    include $view;
} else {
    include 'views/partials/404.php';
}
