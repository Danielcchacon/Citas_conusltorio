<?php
class Mcombo extends CI_Model {

    public function mselectproducto() {
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
        $this ->db->where('p.estado <=','2');

        $resultado = $this->db->get('producto');
        return $resultado->result();
    }
    public function mcombotable($tabla) {
        
        $this ->db->where('estado <=','1');
        $this->db->where('idcomercio', $this->session->userdata('idcomercio'));
        $resultado = $this->db->get($tabla);
        return $resultado->result();
    }
}
?>