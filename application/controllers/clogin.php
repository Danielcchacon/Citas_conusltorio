<?php
class Clogin extends CI_Controller {
public function __construct(){
    parent::__construct();
    $this->load->model('musuario');
}

public function index(){
    if($this->session->userdata('login')){
   redirect(base_url().'cdashboard');
}else {
    $this->load->view("admin/vlogin");
}
}
public function clogeo(){
 $txtnombre = $this->input->post("txtnombre");
 $txtpass = $this ->input->post("txtpass");

 $res = $this->musuario->mlogeo($txtnombre,$txtpass);
 echo $res;
if(!$res){
$this->session ->set_flashdata("error","El Usuario y/O constraseña son incorrectas");
redirect(base_url().'clogin');
}else{
   
$data =array(
    'nombres_usuario' => $res->nombres_usuario,
    'apellidos_usuario'    => $res->apellidos_usuario,
    'correo_usuario'      => $res->correo_usuario,
    'tipo_usuario'     => $res->tipo_usuario,
    'login'     => TRUE,

);
echo $this->session->set_userdata($data);
redirect(base_url(). 'cdashboard');
    }
}
public function csignup() {
    
    $txtnombrecomercio = $this->input->post('txtnombrecomercio');
    $txtnombre = $this->input->post("txtnombre");
    $txtemail = $this->input->post('txtemail');
    $txtpass = $this->input->post("txtpass");
    $txtpassconfirm = $this->input->post("txtpassconfirm");

    if (!($txtpass == $txtpassconfirm)){
        $this->session->set_flashdata("error", "La contraseña no coincide.");
        redirect(base_url().'clogin');
        
        }else {
            $firstName = explode(' ', $txtnombre)[0];
        $randomDigits = str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
        $user = strtolower($firstName . $randomDigits); // Convert to lowercase for consistency
        $hashedPassword = password_hash($txtpass, PASSWORD_DEFAULT);
        
        $mensaje = $this->musuario->msignup([
            'nombre_comercio' => $txtnombrecomercio,
            'nombre_usuario' => $txtnombre,
            'user'=>$user,
            'email' => $txtemail,
            'pass' => $hashedPassword, // Store the hashed password
        ]);
        
        if ($mensaje === 'OK') {
        
            $this->session->set_flashdata("success", "Tu cuenta ha sido registrada exitosamente, ya puedes iniciar sesión!");
            
            redirect(base_url().'clogin');
        } 
    else if ($mensaje === 'error_email_existe') {
    
            $this->session->set_flashdata("error", "Correo ya registrado, intente con otro!");
    
            redirect(base_url().'clogin');
            
        }



    }

}
public function crenderforgotpassword(){
    $this->load->view('admin/vforgot_password');
    return;
}
public function cforgotPassword() {

    $email = $this->input->post('txtemail');

    $user_result = $this->musuario->mgetUserByEmail($email);

    if ($user_result) {
        $token = bin2hex(random_bytes(32));

        $expiration = time() + 3600;

        $this->musuario->mstoreResetToken($user_result->idusuario, $token, $expiration);

        // Enviar  correo electrónico con el enlace de restablecimiento
        $this->sendResetEmail($email, $token);

        // Redirigir o mostrar un mensaje de éxito
        $this->session->set_flashdata("success", "Revisa tu Correo.");
        
        redirect(base_url().'clogin');
    } else {
        // El correo electrónico no existe, mostrar un mensaje de error
        $this->session->set_flashdata("error", "El correo electrónico no existe en nuestra base de datos.");
        redirect(base_url().'clogin/crenderforgotpassword');

    }

}
private function sendResetEmail($email, $token) {
    $this->load->library('email');

    // Configuración de la biblioteca de correo
    $config['protocol']     = 'smtp';
    $config['smtp_host']    = 'smtp.gmail.com';
    $config['smtp_port']    = 587;
    $config['smtp_user']    = 'support@checkooutplus.com';
    $config['smtp_pass']    = 'ycng xqxq zdgy fvob';
    // $config['smtp_pass']    = 'bafe pckv ystg bukz';
    $config['smtp_crypto']  = 'tls'; 
    $config['mailtype']     = 'html';
    $config['charset']      = 'utf-8';
    $config['newline']      = "\r\n";

    $this->email->initialize($config);

    // Configuración específica del correo
    $this->email->from('support@checkooutplus.com', 'CHECKOOUTPLUS'); // Cambia esto a tu dirección de correo electrónico y nombre
    $this->email->to($email);
    $this->email->subject('Restablecimiento de Contraseña');
    $this->email->message('Haz clic en el siguiente enlace para restablecer tu contraseña: ' . base_url() . 'clogin/resetPassword/' . $token);

    // Envía el correo electrónico
    $this->email->send();
}

 public function resetPassword($token) {
        // Obtener información del token de la base de datos
        $tokenInfo = $this->musuario->mgetTokenInfo($token);

        if ($tokenInfo) {
            // Verificar si el token ha expirado
            if (time() < $tokenInfo->expiration) {
                // Mostrar el formulario de restablecimiento de contraseña
                $this->load->view('admin/vreset_password', ['token' => $token]);
            } else {
                // Token expirado, mostrar un mensaje de error
                $data['error'] = 'El enlace de restablecimiento de contraseña ha caducado.';
                $this->load->view('admin/token_expirado', $data);
            }
        } else {
            // Token no válido, mostrar un mensaje de error
            $data['error'] = 'El enlace de restablecimiento de contraseña no es válido.';
            $this->load->view('admin/token_expirado', $data);
        }
    }

    public function processResetPassword() {
        // Obtener datos del formulario
        $token = $this->input->post('token');
        $password = $this->input->post('txtpass');

        // Validar y actualizar la contraseña en la base de datos
        $result = $this->musuario->mresetPassword($token, $password);

        if ($result) {
            // Mostrar mensaje de éxito
            $this->session->set_flashdata("success", "YA PUEDES INCIAR SESSIONM");
        
            redirect(base_url().'clogin');
        } else {
            // Mostrar mensaje de error
            $this->session->set_flashdata("error", "Error al restablecer la contraseña. Inténtelo de nuevo.");
            redirect(base_url().'clogin/crenderforgotpassword'.$token);
         
    }
    }


public function clogout(){
    $this->session->sess_destroy();
    redirect(base_url().'clogin');
}


}
