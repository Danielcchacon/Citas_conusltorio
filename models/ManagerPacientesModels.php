<?php
class ManagerPacientesModels
{
    private $db;
    public function __construct($conn)
    {
        $this->db = $conn;
    }
    public function list()
    {
        try {
            $sql = "SELECT 
                        p.nombres_paciente,
                        p.apellidos_paciente, 
                        p.documento_paciente,
                        p.telefono_paciente,
                        tr.descripcion_tipo_regimen,
                        e.nombre_eps 
                    FROM
                        consultorio.paciente p
                    INNER JOIN tipo_regimen tr ON tr.tipo_regimen_id = p.tipo_paciente
                    INNER JOIN eps e ON e.eps_id = p.eps_paciente";
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

  


