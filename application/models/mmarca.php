<?php
class Mmarca  extends CI_Model  {
    public function mselectmarca() {
        $this ->db->where('estado <=','2');
        $this->db->where('idcomercio', $this->session->userdata('idcomercio'));
        $resultado = $this->db->get('marca');
        return $resultado->result();
    }
    public function minsertmarca($data) {
    return $this ->db->insert('marca', $data);
    }

    public function miupdatemarca($idmarca) {
    $this->db->where('idmarca',$idmarca);
    $resultado = $this->db->get('marca');
    return $resultado->row();
    }
    public function mupdatemarca($idmarca,$date) {
    $this->db->where('idmarca',$idmarca);
    return $this->db->update('marca', $date);
    }
    public function mdeletemarca($idmarca) {
    $this->db->where('idmarca',$idmarca);
    return $this->db->delete('marca');
    }

}

   
?>