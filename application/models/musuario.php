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


public function msignup($data) {
    // Iniciar el mensaje con un valor predeterminado
    $this->db->query("SET @mensaje = '0'");
    
    // Formatear los valores adecuadamente antes de la llamada al procedimiento almacenado
    $nombre_comercio = $this->db->escape($data['nombre_comercio']);
    $nombre_usuario = $this->db->escape($data['nombre_usuario']);
    $user = $this->db->escape($data['user']);
    $email = $this->db->escape($data['email']);
    $pass = $this->db->escape($data['pass']);

    // Llamada al procedimiento almacenado
    $this->db->query("CALL checkoutplus.CrearComercioYUsuario($nombre_comercio, $nombre_usuario, $user, $email, $pass, @mensaje)");

    // Obtener el valor de @mensaje
    $query = $this->db->query("SELECT @mensaje AS mensaje");
    $result = $query->row();
    $mensaje = $result->mensaje;

    // Devolver el mensaje resultante
    return $mensaje;

}

public function mgetUserByEmail($email) {
    // Obtener información del usuario por correo electrónico
    $query = $this->db->get_where('usuario', array('email' => $email));
    return $query->row();
}

public function mstoreResetToken($userId, $token, $expiration) {
    // Almacenar el token de restablecimiento en la base de datos
    $data = array(
        'idusuario' => $userId,
        'token' => $token,
        'expiration' => $expiration
    );

    $this->db->insert('reset_tokens', $data);
}

public function mgetTokenInfo($token) {
    // Obtener información del token de restablecimiento
    $query = $this->db->get_where('reset_tokens', array('token' => $token));
    return $query->row();
}

public function mresetPassword($token, $password) {
    // Actualizar la contraseña del usuario usando el token
    $tokenInfo = $this->mgetTokenInfo($token);

    if ($tokenInfo && time() < $tokenInfo->expiration) {
        // Token válido y no expirado
        $data = array('pass' => password_hash($password, PASSWORD_DEFAULT));
        $this->db->where('idusuario', $tokenInfo->idusuario);
        $this->db->update('usuario', $data);

        // Eliminar el token de restablecimiento después de usarlo
        $this->db->where('token', $token);
        $this->db->delete('reset_tokens');

        return true;
    }

    return false;
}

}

?>