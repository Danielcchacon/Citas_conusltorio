<?php
class MpendingConsultations  extends CI_Model  {
  
    public function mselectpendingConsultations() {
        $this->db->select('
        c.fecha_consulta,
        p.nombres_paciente AS nombre_paciente,
        m.nombres_medico AS nombre_medico
    ');
    $this->db->from('consulta c');
    $this->db->join('paciente p', 'c.paciente_id = p.paciente_id', 'inner');
    $this->db->join('medico m', 'c.medico_id = m.medico_id', 'inner');
    $this->db->where('DATE(c.fecha_consulta)', 'CURDATE()', false);
    $this->db->group_by(array('c.fecha_consulta', 'nombre_paciente', 'nombre_medico'));
    $this->db->order_by('c.fecha_consulta', 'ASC');
    $query = $this->db->get();
    return $query->result();
    
    }
    


}

   
?>