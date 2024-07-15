
 <?php

$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "consultorio";
// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Establecer la codificación de caracteres si es necesario
$conn->set_charset("utf8");

// Devolver la conexión para poder reutilizarla en otros archivos
return $conn;

?>
