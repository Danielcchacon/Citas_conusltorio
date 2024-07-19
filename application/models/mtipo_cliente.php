<?php
class Mtipo_cliente  extends CI_Model  {
    public function mselecttipo_cliente() {
        $this ->db->where('estado <=','2');
        $this->db->where('idcomercio', $this->session->userdata('idcomercio'));
        $resultado = $this->db->get('tipo_cliente');
        return $resultado->result();
    }
    public function minserttipo_cliente($data) {
    return $this ->db->insert('tipo_cliente', $data);
    }

    public function miupdatetipo_cliente($idtipo_cliente) {
    $this->db->where('idtipo_cliente',$idtipo_cliente);
    $resultado = $this->db->get('tipo_cliente');
    return $resultado->row();
    }
    public function mupdatetipo_cliente($idtipo_cliente,$date) {
    $this->db->where('idtipo_cliente',$idtipo_cliente);
    return $this->db->update('tipo_cliente', $date);
    }
    public function mdeletetipo_cliente($idtipo_cliente) {
        $this->db->where('idtipo_cliente',$idtipo_cliente);
        return $this->db->delete('tipo_cliente');
        }
  
 
	

}

   
?>