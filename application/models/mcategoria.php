<?php
class Mcategoria  extends CI_Model  {
    public function mselectcategoria() {
        $this ->db->where('estado <=','2');
        $this->db->where('idcomercio', $this->session->userdata('idcomercio'));
        $resultado = $this->db->get('categoria');
        return $resultado->result();
    }
    public function mproductcategoria($idcategoria) {

        $this->db->select('p.nombre as producto, 
                   p.descripcion as descripcion, 
                   m.nombre as marca,
                   tm.nombre as Material,
                   p.observacion');
        $this->db->from('producto p');
        $this->db->join('categoria c', 'c.idcategoria = p.idcategoria');
        $this->db->join('marca m', 'm.idmarca = p.idmarca');
        $this->db->join('tipo_material tm', 'tm.idtipo_material = p.idtipo_material');
        $this->db->where('p.idcategoria', $idcategoria);
        $resultado = $this->db->get('producto');
        return $resultado->result();
    }
    
    public function minsertcategoria($data) {
    return $this ->db->insert('categoria', $data);
    }

    public function miupdatecategoria($idcategoria) {
    $this->db->where('idcategoria',$idcategoria);
    $resultado = $this->db->get('categoria');
    return $resultado->row();
    }
    public function mupdatecategoria($idcategoria,$date) {
    $this->db->where('idcategoria',$idcategoria);
    return $this->db->update('categoria', $date);
    }
    public function mdeletecategoria($idcategoria) {
    $this->db->where('idcategoria',$idcategoria);
    return $this->db->delete('categoria');
    }

}

   
?>