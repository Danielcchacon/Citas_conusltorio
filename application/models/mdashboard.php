<?php
class Mdashboard  extends CI_Model  {
    public function mselectdashboard() {
        $this->db->select('
            c.fecha_consulta,
            p.nombres_paciente AS nombre_paciente,
            m.nombres_medico AS nombre_medico
        ');
            $this->db->from('consulta c');
        $this->db->join('paciente p', 'c.paciente_id = p.paciente_id', 'inner');
        $this->db->join('medico m', 'c.medico_id = m.medico_id', 'inner');
        $this->db->where('(c.antecedentes_medicos IS NULL OR TRIM(c.antecedentes_medicos) = "" 
            OR c.examen_fisico IS NULL OR TRIM(c.examen_fisico) = "" 
            OR c.diagnostico IS NULL OR TRIM(c.diagnostico) = "" 
            OR c.tratamiento_medico IS NULL OR TRIM(c.tratamiento_medico) = "" 
            OR c.evolucion_paciente IS NULL OR TRIM(c.evolucion_paciente) = "")', NULL, FALSE);
        $this->db->group_by(array(
            'c.fecha_consulta',
            'nombre_paciente',
            'nombre_medico'
        ));
        $this->db->order_by('c.fecha_consulta');
        $resultado = $this->db->get();
        return $resultado->result();
    }

    public function minsertcita($id_medico, $id_paciente, $id_tipo_consulta, $horayfecha) {
        $sql = "SELECT agregar_consulta(?, ?, ?, ?, '', '', '', '', '') AS result";
        $query = $this->db->query($sql, array($id_medico, $id_paciente, $id_tipo_consulta, $horayfecha));
        return $query->row()->result; // Assuming the function returns a single value
    }
    
    
    public function miupdatedashboard($iddashboard) {
    $this->db->where('dashboard_id',$iddashboard);
    $resultado = $this->db->get('dashboard');
    return $resultado->row();
    }
    public function mupdatedashboard($iddashboard,$date) {
    $this->db->where('dashboard_id',$iddashboard);
    return $this->db->update('dashboard', $date);
    }
    public function mdeletedashboard($iddashboard) {
    $this->db->where('dashboard_id',$iddashboard);
    return $this->db->delete('dashboard');
    }

}

   
?>