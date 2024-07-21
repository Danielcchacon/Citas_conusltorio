<?php
class Musuarios extends CI_Model
{
    public function mselectusuarios()
    {
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
        $resultado = $this->db->get();
        return $resultado->result();
    }

    public function minsertusuarios($data)
    {
        return $this->db->insert('usuario', $data);
    }
    public function miupdateusuarios($idusuarios)
    {
        $this->db->where('usuario_id', $idusuarios);
        $resultado = $this->db->get('usuario');
        return $resultado->row();
    }
    public function mupdateusuarios($idusuarios, $date)
    {
        $this->db->where('usuario_id', $idusuarios);
        return $this->db->update('usuario', $date);
    }
    public function mdeleteusuarios($idusuarios)
    {
        $this->db->where('usuario_id', $idusuarios);
        return $this->db->delete('usuario');
    }

}


?>