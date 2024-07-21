<?php
class Mdashboard  extends CI_Model  {
    // public function mselectdashboard() {
    //     $this->db->select("c.*, tdp.codigo codtipo_documento,tdp.nombre tipo_documento, tpc.codigo codtipo_dashboard, tpc.nombre tipo_dashboard");
    //     $this->db->from("dashboard c");
    //     $this->db->join("tipo_documento tdp","c.idtipo_documento= tdp.idtipo_documento");
    //     $this->db->join("tipo_dashboard tpc","c.idtipo_dashboard = tpc.idtipo_dashboard");
    //     $this ->db->where('c.estado <=','2');
    //     $resultado = $this->db->get('dashboard');

    //     return $resultado->result();
    // }
    public function mselectdashboard() {
        // Select the desired columns from the tables
        $this->db->select('
p.dashboard_id, p.nombres_dashboard, p.apellidos_dashboard, p.documento_dashboard, p.telefono_dashboard, tr.descripcion_tipo_regimen, e.nombre_eps');
        $this->db->from('consultorio.dashboard p');
        $this->db->join('tipo_regimen tr', 'tr.tipo_regimen_id = p.tipo_dashboard', 'inner');
        $this->db->join('eps e', 'e.eps_id = p.eps_dashboard', 'inner');
        // Execute the query
        $resultado = $this->db->get();
        // Return the result as an array of objects
        return $resultado->result();
    }
    
    


    
    public function minsertcita($data) {
    return $this ->db->insert('dashboard', $data);
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