<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cusuarios extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url() . 'clogin');
		}
		$this->load->model('musuarios');
		$this->load->model('mcombo');
	}
	public function index()
	{
		$data = array(
			'usuariosindex' => $this->musuarios->mselectusuarios(),

		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/vlist', $data);
		$this->load->view('layouts/footer');
	}
	//insert
	public function cadd()
	{

		$data = array(
			'tipo_usuariocombo' => $this->mcombo->mcombotable('tipo_usuario'),


	
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/vadd', $data);
		$this->load->view('layouts/footer');

	}
	public function cinsert()
{
    $this->form_validation->set_rules('txtnombre', 'Nombre', 'required');
    $this->form_validation->set_rules('txtapellido', 'Apellido', 'required');
    $this->form_validation->set_rules('txtdocumento', 'Documento', 'required|is_unique[usuario.documento_usuario]');
    $this->form_validation->set_rules('txttelefono', 'Telefono', 'required');
    $this->form_validation->set_rules('txtcorreo', 'Correo', 'required|valid_email');
    $this->form_validation->set_rules('txtrol', 'ROL', 'required');
    $this->form_validation->set_rules('txtcontraseña', 'Contraseña', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        $this->cadd();
    } else {
        $data = array(
            'nombres_usuario' => $this->input->post('txtnombre'),
            'apellidos_usuario' => $this->input->post('txtapellido'),
            'documento_usuario' => $this->input->post('txtdocumento'),
            'correo_usuario' => $this->input->post('txtcorreo'),
            'telefono_usuario' => $this->input->post('txttelefono'),
            'tipo_usuario' => $this->input->post('txtrol'),
            'contrasena_usuario' => $this->input->post('txtcontraseña')
        );

        $res = $this->musuarios->minsertusuarios($data);
        if ($res) {
            $this->session->set_flashdata('success', 'Guardo Correctamente');
            redirect(base_url() . 'mantenimiento/cusuarios');
        } else {
            $this->session->set_flashdata('error', 'No se pudo guardar el usuario');
            $this->cadd();
        }
    }
}


	public function cedit($idusuarios)
	{

		$data = array(
			'usuariosedit' => $this->musuarios->miupdateusuarios($idusuarios),
			'tipo_usuariocombo' => $this->mcombo->mcombotable('tipo_usuario'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/vedit', $data);
		$this->load->view('layouts/footer');

	}


	public function cupdate()
	{
		$idusuarios = $this->input->post('txtidusuarios');
		$nombre = $this->input->post('txtnombre');
		$apellido = $this->input->post('txtapellido');
		$documento = $this->input->post('txtdocumento');
		$telefono = $this->input->post('txttelefono');
		$correo = $this->input->post('txtcorreo');
		$rol = $this->input->post('txtrol');
		$contrasena = $this->input->post('txtcontrasena');
	
		$usuariosActual = $this->musuarios->miupdateusuarios($idusuarios);
	
		if ($documento == $usuariosActual->documento_usuario) {
			$unique_doc = '';
		} else {
			$unique_doc = '|is_unique[usuario.documento_usuario]';
		}
	
		if ($correo == $usuariosActual->correo_usuario) {
			$unique_email = '';
		} else {
			$unique_email = '|is_unique[usuario.correo_usuario]';
		}
	
		$this->form_validation->set_rules('txtdocumento', 'documento', 'required' . $unique_doc);
		$this->form_validation->set_rules('txtcorreo', 'correo', 'required|valid_email' . $unique_email);
		$this->form_validation->set_rules('txtnombre', 'nombre', 'required');
		$this->form_validation->set_rules('txtapellido', 'apellido', 'required');
		$this->form_validation->set_rules('txttelefono', 'telefono', 'required');
	
		if ($this->form_validation->run()) {
			$data = array(
				'usuario_id' => $idusuarios,
				'nombres_usuario' => $nombre,
				'apellidos_usuario' => $apellido,
				'documento_usuario' => $documento,
				'correo_usuario' => $correo,
				'telefono_usuario' => $telefono,
				'tipo_usuario' => $rol,
			);
	
			if ($contrasena) {
				$data['contrasena_usuario'] = $contrasena;
			}
	
			$res = $this->musuarios->mupdateusuarios($idusuarios, $data);
	
			if ($res) {
				$this->session->set_flashdata('success', 'Se Guardó Correctamente');
				redirect(base_url() . 'mantenimiento/cusuarios');
			} else {
				$this->session->set_flashdata('error', 'No se pudo actualizar el usuario');
				redirect(base_url() . 'mantenimiento/cusuarios/cedit/' . $idusuarios);
			}
		} else {
			$this->session->set_flashdata('error', validation_errors());
			$this->cedit($idusuarios);
		}
	}
	

	public function cdelete($idusuarios)
	{
		try {
			$this->musuarios->mdeleteusuarios($idusuarios);
			echo "cusuarios";
		} catch (\Exception $e) {
			// Captura la excepción y muestra un mensaje específico
			if ($e->errorInfo[1] == 1451) {
				echo "No se puede eliminar el usuarios. Está asociado a productos.";
			} else {
				echo "Error: " . $e->getMessage();
			}
		}
	}
}
?>