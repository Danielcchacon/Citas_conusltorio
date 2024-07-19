<?php
class Mtipo_material  extends CI_Model  {
    public function mselecttipo_material() {
        $this ->db->where('estado <=','2');
        $this->db->where('idcomercio', $this->session->userdata('idcomercio'));
        $resultado = $this->db->get('tipo_material');
        return $resultado->result();
    }
    public function minserttipo_material($data) {
    return $this ->db->insert('tipo_material', $data);
    }

    public function miupdatetipo_material($idtipo_material) {
    $this->db->where('idtipo_material',$idtipo_material);
    $resultado = $this->db->get('tipo_material');
    return $resultado->row();
    }
    public function mupdatetipo_material($idtipo_material,$date) {
    $this->db->where('idtipo_material',$idtipo_material);
    return $this->db->update('tipo_material', $date);
    }
    public function mdeletetipo_material($idtipo_material) {
    $this->db->where('idtipo_material',$idtipo_material);
    return $this->db->delete('tipo_material');
    }

}

   
?>