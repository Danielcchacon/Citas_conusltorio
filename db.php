<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "consultorio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

