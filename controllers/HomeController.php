<?php
require_once 'models/User.php';

class HomeController
{
    private $conn; // Variable para almacenar la conexión
    public function __construct()
    {
        // Incluir el archivo de conexión a la base de datos
        $this->conn = include 'db.php';
    }
    public function index()
    {
        include 'views/admin/home.php';
    }
}
?>