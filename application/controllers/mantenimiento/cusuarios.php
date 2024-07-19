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
			
			'eps_usuarioscombo' => $this->mcombo->mcombotable('eps'),
			'tipo_regimencombo' => $this->mcombo->mcombotable('tipo_regimen'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/vadd',$data);
		$this->load->view('layouts/footer');

	}
	public function cinsert()
	{
		
		$idusuarios = $this->input->post('txtidusuarios');
$nombre = $this->input->post('txtnombre'); // Cambio aquí
$apellido = $this->input->post('txtapellido'); // Cambio aquí
$documento = $this->input->post('txtdocumento'); // Si este campo también se ha cambiado, actualízalo en el formulario
$telefono = $this->input->post('txttelefono');
$eps_id = $this->input->post('txteps'); // Asegúrate de que este campo exista en el formulario
$regimen = $this->input->post('txtregimen');

$data = array(
	'usuarios_id' => $idusuarios,
	'nombres_usuarios' => $nombre,
	'apellidos_usuarios'   => $apellido,
	'documento_usuarios' => $documento,
	'telefono_usuarios'=> $telefono,
	'eps_usuarios'=> $eps_id,
	'tipo_usuarios'=> $regimen,
	
);
			$res = $this->musuarios->minsertusuarios($data);
			if ($res) {
				$this->session->set_flashdata('success', 'Guardo Correctamente');
				redirect(base_url() . 'mantenimiento/cusuarios');
			
		} else {
			$this->session->set_flashdata('error', 'No se puedo guardar la usuarios');
			$this->cadd();
		}


	}

	public function cedit($idusuarios){

		$data = array(
			'usuariosedit' => $this->musuarios->miupdateusuarios($idusuarios),
			'tipo_usuariocombo' => $this->mcombo->mcombotable('tipo_usuario'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/vedit', $data);
		$this->load->view('layouts/footer');

	}

	public function cupdate(){

		$idusuarios = $this->input->post('txtidusuarios');
$nombre = $this->input->post('txtnombre'); // Cambio aquí
$apellido = $this->input->post('txtapellido'); // Cambio aquí
$documento = $this->input->post('txtdocumento'); // Si este campo también se ha cambiado, actualízalo en el formulario
$telefono = $this->input->post('txttelefono');
$eps_id = $this->input->post('txteps'); // Asegúrate de que este campo exista en el formulario
$regimen = $this->input->post('txtregimen');

		$usuariosActual = $this->musuarios->miupdateusuarios($idusuarios);
		// var_dump($usuariosActual);
		// if ($codigo == $usuariosActual->codigo) {
		// 	$unique = '';
		// } else {

		// 	$unique = '|is_unique[usuarios.codigo]';
		// }
		// $this->form_validation->set_rules('txtcodigo', 'codigo', 'required' . $unique);

		// if ($this->form_validation->run()) {
			$data = array(
				'usuarios_id' => $idusuarios,
				'nombres_usuarios' => $nombre,
				'apellidos_usuarios'   => $apellido,
				'documento_usuarios' => $documento,
				'telefono_usuarios'=> $telefono,
				'eps_usuarios'=> $eps_id,
				'tipo_usuarios'=> $regimen,
			);
			$res = $this->musuarios->mupdateusuarios($idusuarios, $data);

			if ($res) {
				$this->session->set_flashdata('success', 'Se Guardó Correctamente');
				redirect(base_url() . '/mantenimiento/cusuarios');
			} else {

				$this->session->set_flashdata('error', 'No se puedo Actulizar la usuarios ');
				redirect(base_url() . '/mantenimiento/cusuarios/cedit' . $idusuarios);
			}
		// } else {
		// 	$this->session->set_flashdata('error', 'No se pudo guardar la usuarios ');
		// 	$this->cedit($idusuarios);


		// }
	}
	//DELETE 
	// public function cdelete($idusuarios){
	// 	$this->musuarios->mdeleteusuarios($idusuarios);
	// 	redirect(base_url() . "mantenimiento/cusuarios");
	// }

	public function cdelete($idusuarios) {
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