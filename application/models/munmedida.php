<?php
class Munmedida  extends CI_Model  {
    public function mselectunmedida() {
        $this ->db->where('estado <=','2');
        $this->db->where('idcomercio', $this->session->userdata('idcomercio'));
        $resultado = $this->db->get('unmedida');
        return $resultado->result();
    }
    public function minsertunmedida($data) {
    return $this ->db->insert('unmedida', $data);
    }

    public function miupdateunmedida($idunmedida) {
    $this->db->where('idunmedida',$idunmedida);
    $resultado = $this->db->get('unmedida');
    return $resultado->row();
    }
    public function mupdateunmedida($idunmedida,$date) {
    $this->db->where('idunmedida',$idunmedida);
    return $this->db->update('unmedida', $date);
    }
    public function mdeleteunmedida($idunmedida) {
    $this->db->where('idunmedida',$idunmedida);
    return $this->db->delete('unmedida');
    }

}

   
?>