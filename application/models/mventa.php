<?php
class Mventa  extends CI_Model  {
    public function mselectventa() {
        $this ->db->where('estado <=','2');
        $resultado = $this->db->get('venta');
        return $resultado->result();
    }
    public function minsertventa($data) {
    return $this ->db->insert('venta', $data);
    }

    public function miupdateventa($idventa) {
    $this->db->where('idventa',$idventa);
    $resultado = $this->db->get('venta');
    return $resultado->row();
    }
    public function mupdateventa($idventa,$date) {
    $this->db->where('idventa',$idventa);
    return $this->db->update('venta', $date);
    }
    public function mdeleteventa($idventa) {
    $this->db->where('idventa',$idventa);
    return $this->db->delete('venta');
    }

}

   
?>