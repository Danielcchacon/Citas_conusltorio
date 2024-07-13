<?php
require_once 'db.php';

class User {
    public function authenticate($username, $password) {
        global $conn;

        $username = $conn->real_escape_string($username);
        $sql = "SELECT * FROM usuarios WHERE login='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if ($password == $user['password']) {
                return $user;
            }
        }
        return false;
    }
}
?>
