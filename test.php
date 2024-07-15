<?php
require_once 'db.php';  // Incluir el archivo de conexión

// Ejemplo de consulta: Sumar dos números
$sql = "SELECT 10 + 5 AS suma";
$result = $conn->query($sql);

if ($result) {
    // Obtener el resultado de la consulta
    $row = $result->fetch_assoc();
    
    // Mostrar el resultado
    echo "El resultado de la suma es: " . $row['suma'];
} else {
    // Manejo de errores si la consulta falla
    echo "Error al ejecutar la consulta: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
