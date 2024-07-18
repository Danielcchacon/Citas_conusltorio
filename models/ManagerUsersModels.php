<?php
class ManagerUsersModels {
    private $db;
    public function __construct($conn) {
        $this->db = $conn;
    }
    public function list() {
        try {
            $sql = "SELECT
u.usuario_id,
 u.nombres_usuario,
 u.apellidos_usuario,
 u.documento_usuario,
 u.correo_usuario,
 u.telefono_usuario,
 tu.descripcion_tipo_usuario,
 u.estado_usuario,
 u.fecha_usuario
 FROM consultorio.usuario u
 INNER JOIN tipo_usuario tu on u.tipo_usuario = tu.tipo_usuario_id;";
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

