<?php
class Mproducto  extends CI_Model  {
    
    public function mselectproducto($estado,$stock) {
        $this->db->distinct();
        $this->db->select("P.*,
        c.nombre categoria,
        tpm.nombre tipo_material,
        ma.nombre marca,
        col.nombre color,
        u.nombre unmedida");
        $this->db->from("producto p");
        $this->db->join("categoria c ","p.idcategoria= c.idcategoria");
        $this->db->join("tipo_material tpm","p.idtipo_material = tpm.idtipo_material");
        $this->db->join("marca ma","p.idmarca=ma.idmarca");
        $this->db->join("unmedida u","p.idunmedida=u.idunmedida");
        $this->db->join("color col","p.idcolor= col.idcolor");
        $this->db->where('p.idcomercio', $this->session->userdata('idcomercio'));
        $this ->db->where('p.estado <=',$estado);
        $this ->db->where('p.stock >=',$stock);

        $resultado = $this->db->get();
        return $resultado->result();
    }
    public function minsertproducto($data) {
    return $this ->db->insert('producto', $data);
    }

    public function miupdateproducto($idproducto) {
    $this->db->where('idproducto',$idproducto);
    $resultado = $this->db->get('producto');
    return $resultado->row();
    }
    public function mupdateproducto($idproducto,$date) {
    $this->db->where('idproducto',$idproducto);
    return $this->db->update('producto', $date);
    }
    public function mdeleteproducto($idproducto) {
    $this->db->where('idproducto',$idproducto);
    return $this->db->delete('producto');
    }

}

   
?>