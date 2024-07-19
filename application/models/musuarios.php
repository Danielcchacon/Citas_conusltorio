<?php
class Musuarios  extends CI_Model  {
    public function mselectusuarios() {
        $this ->db->where('estado <=','2');
        $this->db->where('idcomercio', $this->session->userdata('idcomercio'));
        $resultado = $this->db->get('usuarios');
        return $resultado->result();
    }
    public function mproductusuarios($idusuarios) {

        $this->db->select('p.nombre as producto, 
                   p.descripcion as descripcion, 
                   m.nombre as marca,
                   tm.nombre as Material,
                   p.observacion');
        $this->db->from('producto p');
        $this->db->join('usuarios c', 'c.idusuarios = p.idusuarios');
        $this->db->join('marca m', 'm.idmarca = p.idmarca');
        $this->db->join('tipo_material tm', 'tm.idtipo_material = p.idtipo_material');
        $this->db->where('p.idusuarios', $idusuarios);
        $resultado = $this->db->get('producto');
        return $resultado->result();
    }
    
    public function minsertusuarios($data) {
    return $this ->db->insert('usuarios', $data);
    }

    public function miupdateusuarios($idusuarios) {
    $this->db->where('idusuarios',$idusuarios);
    $resultado = $this->db->get('usuarios');
    return $resultado->row();
    }
    public function mupdateusuarios($idusuarios,$date) {
    $this->db->where('idusuarios',$idusuarios);
    return $this->db->update('usuarios', $date);
    }
    public function mdeleteusuarios($idusuarios) {
    $this->db->where('idusuarios',$idusuarios);
    return $this->db->delete('usuarios');
    }

}

   
?>