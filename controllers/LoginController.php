<?php
require_once 'models/User.php';

class LoginController
{
    private $conn; // Variable para almacenar la conexión

    public function __construct()
    {
        // Incluir el archivo de conexión a la base de datos
        $this->conn = include 'db.php';
    }
    public function index()
    {
        include 'views/login/login.php';
    }
    public function authenticate()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User($this->conn); // Pasar la conexión a User
            $loggedInUser = $user->authenticate($username, $password);

            if ($loggedInUser) {
               
                $_SESSION['id_user'] = $loggedInUser['usuario_id'];
                $_SESSION['nombre'] = $loggedInUser['nombres_usuario'];
                $_SESSION['apellido'] = $loggedInUser['apellidos_usuario'];
                return true;
            } else {
                header("Location: index.php?controller=LoginController&action=index&error=1");
                exit();
            }
        }
    }
    public function logout() {
        // Iniciar la sesión para poder destruirla
        session_start();
        // Eliminar todas las variables de sesión
        session_unset();
        // Destruir la sesión
        session_destroy();
        
        // Redirigir a la página deseada sin parámetros en la URL
        header("Location: /consultorio/index.php"); // Asegúrate de poner la ruta deseada
        exit();
    }
    
}
?>