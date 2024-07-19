<?php
class Mcliente  extends CI_Model  {
    // public function mselectcliente() {
    //     $this->db->select("c.*, tdp.codigo codtipo_documento,tdp.nombre tipo_documento, tpc.codigo codtipo_cliente, tpc.nombre tipo_cliente");
    //     $this->db->from("cliente c");
    //     $this->db->join("tipo_documento tdp","c.idtipo_documento= tdp.idtipo_documento");
    //     $this->db->join("tipo_cliente tpc","c.idtipo_cliente = tpc.idtipo_cliente");
    //     $this ->db->where('c.estado <=','2');
    //     $resultado = $this->db->get('cliente');

    //     return $resultado->result();
    // }
    public function mselectcliente() {
        $this->db->distinct();
        $this->db->select("c.*, tdp.nombre tipo_documento, tpc.nombre tipo_cliente");
        $this->db->from("cliente c");
        $this->db->join("tipo_documento tdp", "c.idtipo_documento = tdp.idtipo_documento");
        $this->db->join("tipo_cliente tpc", "c.idtipo_cliente = tpc.idtipo_cliente");
        $this->db->where('c.idcomercio', $this->session->userdata('idcomercio'));
        $this->db->where('c.estado <=', '2');
        $resultado = $this->db->get('cliente');
    
        return $resultado->result();
    }
    


    
    public function minsertcliente($data) {
    return $this ->db->insert('cliente', $data);
    }

    public function miupdatecliente($idcliente) {
    $this->db->where('idcliente',$idcliente);
    $resultado = $this->db->get('cliente');
    return $resultado->row();
    }
    public function mupdatecliente($idcliente,$date) {
    $this->db->where('idcliente',$idcliente);
    return $this->db->update('cliente', $date);
    }
    public function mdeletecliente($idcliente) {
    $this->db->where('idcliente',$idcliente);
    return $this->db->delete('cliente');
    }

}

   
?>