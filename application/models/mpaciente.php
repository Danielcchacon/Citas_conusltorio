<?php
class Mpaciente  extends CI_Model  {
    // public function mselectpaciente() {
    //     $this->db->select("c.*, tdp.codigo codtipo_documento,tdp.nombre tipo_documento, tpc.codigo codtipo_paciente, tpc.nombre tipo_paciente");
    //     $this->db->from("paciente c");
    //     $this->db->join("tipo_documento tdp","c.idtipo_documento= tdp.idtipo_documento");
    //     $this->db->join("tipo_paciente tpc","c.idtipo_paciente = tpc.idtipo_paciente");
    //     $this ->db->where('c.estado <=','2');
    //     $resultado = $this->db->get('paciente');

    //     return $resultado->result();
    // }
    public function mselectpaciente() {
        // Select the desired columns from the tables
        $this->db->select('
p.paciente_id, p.nombres_paciente, p.apellidos_paciente, p.documento_paciente, p.telefono_paciente, tr.descripcion_tipo_regimen, e.nombre_eps');
        $this->db->from('consultorio.paciente p');
        $this->db->join('tipo_regimen tr', 'tr.tipo_regimen_id = p.tipo_paciente', 'inner');
        $this->db->join('eps e', 'e.eps_id = p.eps_paciente', 'inner');
        // Execute the query
        $resultado = $this->db->get();
        // Return the result as an array of objects
        return $resultado->result();
    }
    
    


    
    public function minsertpaciente($data) {
    return $this ->db->insert('paciente', $data);
    }

    public function miupdatepaciente($idpaciente) {
    $this->db->where('paciente_id',$idpaciente);
    $resultado = $this->db->get('paciente');
    return $resultado->row();
    }
    public function mupdatepaciente($idpaciente,$date) {
    $this->db->where('paciente_id',$idpaciente);
    return $this->db->update('paciente', $date);
    }
    public function mdeletepaciente($idpaciente) {
    $this->db->where('paciente_id',$idpaciente);
    return $this->db->delete('paciente');
    }

}

   
?>