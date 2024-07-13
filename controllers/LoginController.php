<?php
require_once 'models/User.php';

class LoginController {
    public function index() {
        include 'views/login/login.php';
    }

    public function authenticate() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User();
            $loggedInUser = $user->authenticate($username, $password);

            if ($loggedInUser) {
                session_start();
                $_SESSION['user_id'] = $loggedInUser['id'];
                $_SESSION['username'] = $loggedInUser['username'];
                header("Location: welcome.php");
                exit();
            } else {
                header("Location: index.php?controller=LoginController&action=index&error=1");
                exit();
            }
        }
    }
}
?>
