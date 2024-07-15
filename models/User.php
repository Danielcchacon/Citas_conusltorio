<?php
class User {
    private $db;

    public function __construct($conn) {
        $this->db = $conn;
    }

    public function authenticate($username, $password) {
        $username = $this->db->real_escape_string($username);
        $password = $this->db->real_escape_string($password);

        $sql = "SELECT * FROM usuario WHERE correo_usuario='$username'";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Deberías utilizar password_verify() para verificar la contraseña correctamente
            if ($password == $row['contraseña_usuario']) {
                return $row;
            }
        }
        return false;
    }
}
?>
