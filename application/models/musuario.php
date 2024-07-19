<?php

class Musuario  extends CI_Model {
// public function mlogeo($user_email, $pass) {
//     $this->db->where("(user = '$user_email' OR email = '$user_email')");
//     $this->db->where("pass", $pass);

//     $resultado = $this->db->get("usuario");

//     if ($resultado->num_rows() > 0) {
//         echo $resultado;
//         return $resultado->row();
//     } else {
//         return false;
//     }
// }

public function mlogeo($user_email, $pass) {
    // Assuming that the 'pass' column stores hashed passwords
    $this->db->select('usuario_id, nombres_usuario, apellidos_usuario, correo_usuario, tipo_usuario, contrasena_usuario');
    $this->db->where('correo_usuario', $user_email);
    $query = $this->db->get('usuario');

    if ($query->num_rows() > 0) {
        $user = $query->row();

        // Verify the hashed password
        if ($pass == $user->contrasena_usuario) {
            return $user;
        }
    }

    return false;
}


}

?>