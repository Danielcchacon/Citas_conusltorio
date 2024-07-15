<?php
require_once 'models/User.php';

class LoginController {
    private $conn; // Variable para almacenar la conexión

    public function __construct() {
        // Incluir el archivo de conexión a la base de datos
        $this->conn = include 'db.php';
    }
    public function index() {
        include 'views/login/login.php';
    }
    public function authenticate() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User($this->conn); // Pasar la conexión a User
            $loggedInUser = $user->authenticate($username, $password);

            if ($loggedInUser) {
                session_start();
                $_SESSION['user_id'] = $loggedInUser['usuario_id'];
                $_SESSION['username'] = $loggedInUser['nombres_usuario'];
             return true;
            } else {
                header("Location: index.php?controller=LoginController&action=index&error=1");
                exit();
            }
        }
    }
}
?>
