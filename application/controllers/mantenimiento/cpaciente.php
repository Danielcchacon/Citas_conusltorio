<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpaciente extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url() . 'clogin');
		}
		$this->load->model('mpaciente');
		$this->load->model('mcombo');
	}
	public function index()
	{
		$data = array(
			'pacienteindex' => $this->mpaciente->mselectpaciente(),
			
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/paciente/vlist', $data);
		$this->load->view('layouts/footer');
	}
	//insert
	public function cadd()
	{

		$data = array(
			
			'tipo_documentocombo' => $this->mcombo->mcombotable('tipo_documento'),
			'tipo_pacientecombo' => $this->mcombo->mcombotable('tipo_paciente'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/paciente/vadd',$data);
		$this->load->view('layouts/footer');

	}
	public function cinsert()
	{
		$idtipo_documento = $this->input->post('txttipo_documento');
		$idtipo_paciente = $this->input->post('txttipo_paciente');
		$codigo = $this->input->post('txtcodigo');
		$nombre = $this->input->post('txtnombre');
		$direccion = $this->input->post('txtdireccion');
		$telefono = $this->input->post('txttelefono');
		//validaciones
		// $this->form_validation->set_rules('txtcodigo', 'el código', 'required|is_unique[paciente.codigo]');
		// $this->form_validation->set_rules('txttelefono', 'Telefono', 'required');

		// if ($this->form_validation->run()) {
			// $data = array(
			// 	'idtipo_documento' => $idtipo_documento,
			// 	'idtipo_paciente'   => $idtipo_paciente,
			// 	'codigo' 		   => $codigo,
			// 	'nombre'			=> $nombre,
			// 	'direccion' => $direccion,
			// 	'telefono'=> $telefono,
			// 	'estado' => '1',
			// 	'idcomercio' => $this->session->userdata('idcomercio'),
			// );
			$res = $this->mpaciente->minsertpaciente($data);
			if ($res) {
				$this->session->set_flashdata('success', 'Guardo Correctamente');
				redirect(base_url() . 'mantenimiento/cpaciente');
			// } else {
			// 	$this->session->set_flashdata('error', 'Se no Guardó Registro');
			// 	redirect(base_url() . 'mantenimiento/cpaciente/cadd');

			// }
		} else {
			$this->session->set_flashdata('error', 'No se puedo guardar la paciente');
			$this->cadd();
		}



	}

	public function cedit($idpaciente){

		$data = array(
			'pacienteedit' => $this->mpaciente->miupdatepaciente($idpaciente),
			'eps_pacientecombo' => $this->mcombo->mcombotable('eps'),
			'tipo_regimencombo' => $this->mcombo->mcombotable('tipo_regimen'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/paciente/vedit', $data);
		$this->load->view('layouts/footer');

	}

	public function cupdate(){

		$idpaciente = $this->input->post('txtidpaciente');
$nombre = $this->input->post('txtnombre'); // Cambio aquí
$apellido = $this->input->post('txtapellido'); // Cambio aquí
$documento = $this->input->post('txtdocumento'); // Si este campo también se ha cambiado, actualízalo en el formulario
$telefono = $this->input->post('txttelefono');
$eps_id = $this->input->post('txteps'); // Asegúrate de que este campo exista en el formulario
$regimen = $this->input->post('txtregimen');

		$pacienteActual = $this->mpaciente->miupdatepaciente($idpaciente);
		// var_dump($pacienteActual);
		// if ($codigo == $pacienteActual->codigo) {
		// 	$unique = '';
		// } else {

		// 	$unique = '|is_unique[paciente.codigo]';
		// }
		// $this->form_validation->set_rules('txtcodigo', 'codigo', 'required' . $unique);

		// if ($this->form_validation->run()) {
			$data = array(
				'paciente_id' => $idpaciente,
				'nombres_paciente' => $nombre,
				'apellidos_paciente'   => $apellido,
				'documento_paciente' => $documento,
				'telefono_paciente'=> $telefono,
				'eps_paciente'=> $eps_id,
				'tipo_paciente'=> $regimen,
			);
			$res = $this->mpaciente->mupdatepaciente($idpaciente, $data);

			if ($res) {
				$this->session->set_flashdata('success', 'Se Guardó Correctamente');
				redirect(base_url() . '/mantenimiento/cpaciente');
			} else {

				$this->session->set_flashdata('error', 'No se puedo Actulizar la paciente ');
				redirect(base_url() . '/mantenimiento/cpaciente/cedit' . $idpaciente);
			}
		// } else {
		// 	$this->session->set_flashdata('error', 'No se pudo guardar la paciente ');
		// 	$this->cedit($idpaciente);


		// }
	}
	//DELETE 
	// public function cdelete($idpaciente){
	// 	$this->mpaciente->mdeletepaciente($idpaciente);
	// 	redirect(base_url() . "mantenimiento/cpaciente");
	// }

	public function cdelete($idpaciente) {
		try {
			$this->mpaciente->mdeletepaciente($idpaciente);
			echo "cpaciente";
		} catch (\Exception $e) {
			// Captura la excepción y muestra un mensaje específico
			if ($e->errorInfo[1] == 1451) {
				echo "No se puede eliminar el paciente. Está asociado a productos.";
			} else {
				echo "Error: " . $e->getMessage();
			}
		}
	}
}
?> 