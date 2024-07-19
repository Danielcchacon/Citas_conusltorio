<?php
class Minventario  extends CI_Model  {
    public function mselectinventario() {
        $this ->db->where('estado <=','2');
        $this->db->where('idcomercio', $this->session->userdata('idcomercio'));
        $resultado = $this->db->get('inventario');
        return $resultado->result();
    }
    public function minsertinventario($data) {
    return $this ->db->insert('inventario', $data);
    }

    public function miupdateinventario($idinventario) {
    $this->db->where('idinventario',$idinventario);
    $resultado = $this->db->get('inventario');
    return $resultado->row();
    }
    public function mupdateinventario($idinventario,$date) {
    $this->db->where('idinventario',$idinventario);
    return $this->db->update('inventario', $date);
    }
    public function mdeleteinventario($idinventario) {
    $this->db->where('idinventario',$idinventario);
    return $this->db->delete('inventario');
    }

}

   
?>