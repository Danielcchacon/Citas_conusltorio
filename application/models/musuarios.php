<?php
class Musuarios  extends CI_Model  {
    // public function mselectusuarios() {
    //     $this->db->select("c.*, tdp.codigo codtipo_documento,tdp.nombre tipo_documento, tpc.codigo codtipo_usuarios, tpc.nombre tipo_usuarios");
    //     $this->db->from("usuarios c");
    //     $this->db->join("tipo_documento tdp","c.idtipo_documento= tdp.idtipo_documento");
    //     $this->db->join("tipo_usuarios tpc","c.idtipo_usuarios = tpc.idtipo_usuarios");
    //     $this ->db->where('c.estado <=','2');
    //     $resultado = $this->db->get('usuarios');

    //     return $resultado->result();
    // }
    public function mselectusuarios() {
 // Select the desired columns from the tables
$this->db->select('
u.usuario_id,
u.nombres_usuario,
u.apellidos_usuario,
u.documento_usuario,
u.correo_usuario,
u.telefono_usuario,
tu.descripcion_tipo_usuario,
u.estado_usuario,
u.fecha_usuario
');
$this->db->from('consultorio.usuario u');
$this->db->join('tipo_usuario tu', 'u.tipo_usuario = tu.tipo_usuario_id', 'inner');

// Execute the query
$resultado = $this->db->get();

// Return the result as an array of objects
return $resultado->result();


    }
    
    public function minsertusuarios($data) {
    return $this ->db->insert('usuario', $data);
    }

    public function miupdateusuarios($idusuarios) {
    $this->db->where('usuario_id',$idusuarios);
    $resultado = $this->db->get('usuario');
    return $resultado->row();
    }
    public function mupdateusuarios($idusuarios,$date) {
    $this->db->where('usuario_id',$idusuarios);
    return $this->db->update('usuario', $date);
    }
    public function mdeleteusuarios($idusuarios) {
    $this->db->where('usuario_id',$idusuarios);
    return $this->db->delete('usuario');
    }

}

   
?>