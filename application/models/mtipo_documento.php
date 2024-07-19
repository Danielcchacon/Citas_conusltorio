<?php
class Mtipo_documento  extends CI_Model  {
    public function mselecttipo_documento() {
        $this ->db->where('estado <=','2');
        $this->db->where('idcomercio', $this->session->userdata('idcomercio'));

        $resultado = $this->db->get('tipo_documento');
        return $resultado->result();
    }
    public function minserttipo_documento($data) {
    return $this ->db->insert('tipo_documento', $data);
    }

    public function miupdatetipo_documento($idtipo_documento) {
    $this->db->where('idtipo_documento',$idtipo_documento);
    $resultado = $this->db->get('tipo_documento');
    return $resultado->row();
    }
    public function mupdatetipo_documento($idtipo_documento,$date) {
    $this->db->where('idtipo_documento',$idtipo_documento);
    return $this->db->update('tipo_documento', $date);
    }
    public function mdeletetipo_documento($idtipo_documento) {
    $this->db->where('idtipo_documento',$idtipo_documento);
    return $this->db->delete('tipo_documento');
    }

}

   
?>