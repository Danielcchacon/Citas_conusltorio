<?php
class Mproveedor  extends CI_Model  {
    public function mselectproveedor() {
        $this->db->distinct();
        $this->db->select("c.*,tdp.nombre tipo_documento, tpc.nombre tipo_proveedor");
        $this->db->from("proveedor c");
        $this->db->join("tipo_documento tdp","c.idtipo_documento = tdp.idtipo_documento");
        $this->db->join("tipo_cliente tpc","c.idtipo_cliente = tpc.idtipo_cliente");
        $this->db->where('c.idcomercio', $this->session->userdata('idcomercio'));
        $this ->db->where('c.estado <=','2');
        $resultado = $this->db->get('proveedor');
        return $resultado->result();
    }
    public function minsertproveedor($data) {
    return $this ->db->insert('proveedor', $data);
    }

    public function miupdateproveedor($idproveedor) {
    $this->db->where('idproveedor',$idproveedor);
    $resultado = $this->db->get('proveedor');
    return $resultado->row();
    }
    public function mupdateproveedor($idproveedor,$date) {
    $this->db->where('idproveedor',$idproveedor);
    return $this->db->update('proveedor', $date);
    }
    public function mdeleteproveedor($idproveedor) {
    $this->db->where('idproveedor',$idproveedor);
    return $this->db->delete('proveedor');
    }

}

   
?>