<?php
class ManagerUsersModels {
    private $db;
    public function __construct($conn) {
        $this->db = $conn;
    }
    public function list() {
        try {
            $sql = "SELECT * FROM consultorio.usuario;";
            $result = $this->db->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return [];
            }
        } catch (\Throwable $th) {
            error_log('Error en mostrar los datos: ' . $th->getMessage());
            return false;
        }
    }

    public function add(){
        try {
            $sql = "SELECT * FROM consultorio.usuario;";
            $result = $this->db->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return [];
            }
        } catch (\Throwable $th) {
            error_log('Error en mostrar los datos: ' . $th->getMessage());
            return false;
        }

    }

}

