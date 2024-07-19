<?php
class Mcolor  extends CI_Model  {
    public function mselectcolor() {
        $this ->db->where('estado <=','2');
        $this->db->where('idcomercio', $this->session->userdata('idcomercio'));
        $resultado = $this->db->get('color');
        return $resultado->result();
    }
    public function minsertcolor($data) {
    return $this ->db->insert('color', $data);
    }

    public function miupdatecolor($idcolor) {
    $this->db->where('idcolor',$idcolor);
    $resultado = $this->db->get('color');
    return $resultado->row();
    }
    public function mupdatecolor($idcolor,$date) {
    $this->db->where('idcolor',$idcolor);
    return $this->db->update('color', $date);
    }
    public function mdeletecolor($idcolor) {
    $this->db->where('idcolor',$idcolor);
    return $this->db->delete('color');
    }

}

   
?>