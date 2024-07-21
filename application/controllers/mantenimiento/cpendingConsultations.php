<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CpendingConsultations extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url() . 'clogin');
		}
		$this->load->model('mpendingConsultations');
		$this->load->model('mcombo');
	}
	public function index()
	{
		$data = array(
			'pendingConsultationsindex' => $this->mpendingConsultations->mselectpendingConsultations(),
			
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/pendingConsultations/vview', $data);
		$this->load->view('layouts/footer');
	}
	//insert
	public function cadd()
	{

		$data = array(
			
			'eps_pendingConsultationscombo' => $this->mcombo->mcombotable('eps'),
			'tipo_regimencombo' => $this->mcombo->mcombotable('tipo_regimen'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/pendingConsultations/vadd',$data);
		$this->load->view('layouts/footer');

	}
	public function cinsert()
	{
		
		$idpendingConsultations = $this->input->post('txtidpendingConsultations');
$nombre = $this->input->post('txtnombre'); // Cambio aquí
$apellido = $this->input->post('txtapellido'); // Cambio aquí
$documento = $this->input->post('txtdocumento'); // Si este campo también se ha cambiado, actualízalo en el formulario
$telefono = $this->input->post('txttelefono');
$eps_id = $this->input->post('txteps'); // Asegúrate de que este campo exista en el formulario
$regimen = $this->input->post('txtregimen');

$data = array(
	'pendingConsultations_id' => $idpendingConsultations,
	'nombres_pendingConsultations' => $nombre,
	'apellidos_pendingConsultations'   => $apellido,
	'documento_pendingConsultations' => $documento,
	'telefono_pendingConsultations'=> $telefono,
	'eps_pendingConsultations'=> $eps_id,
	'tipo_pendingConsultations'=> $regimen,
	
);
			$res = $this->mpendingConsultations->minsertpendingConsultations($data);
			if ($res) {
				$this->session->set_flashdata('success', 'Guardo Correctamente');
				redirect(base_url() . 'mantenimiento/cpendingConsultations');
			
		} else {
			$this->session->set_flashdata('error', 'No se puedo guardar la pendingConsultations');
			$this->cadd();
		}


	}

	public function cedit($idpendingConsultations){

		$data = array(
			'pendingConsultationsedit' => $this->mpendingConsultations->miupdatependingConsultations($idpendingConsultations),
			'eps_pendingConsultationscombo' => $this->mcombo->mcombotable('eps'),
			'tipo_regimencombo' => $this->mcombo->mcombotable('tipo_regimen'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/pendingConsultations/vedit', $data);
		$this->load->view('layouts/footer');

	}

	public function cupdate(){

		$idpendingConsultations = $this->input->post('txtidpendingConsultations');
$nombre = $this->input->post('txtnombre'); // Cambio aquí
$apellido = $this->input->post('txtapellido'); // Cambio aquí
$documento = $this->input->post('txtdocumento'); // Si este campo también se ha cambiado, actualízalo en el formulario
$telefono = $this->input->post('txttelefono');
$eps_id = $this->input->post('txteps'); // Asegúrate de que este campo exista en el formulario
$regimen = $this->input->post('txtregimen');

		$pendingConsultationsActual = $this->mpendingConsultations->miupdatependingConsultations($idpendingConsultations);
		// var_dump($pendingConsultationsActual);
		// if ($codigo == $pendingConsultationsActual->codigo) {
		// 	$unique = '';
		// } else {

		// 	$unique = '|is_unique[pendingConsultations.codigo]';
		// }
		// $this->form_validation->set_rules('txtcodigo', 'codigo', 'required' . $unique);

		// if ($this->form_validation->run()) {
			$data = array(
				'pendingConsultations_id' => $idpendingConsultations,
				'nombres_pendingConsultations' => $nombre,
				'apellidos_pendingConsultations'   => $apellido,
				'documento_pendingConsultations' => $documento,
				'telefono_pendingConsultations'=> $telefono,
				'eps_pendingConsultations'=> $eps_id,
				'tipo_pendingConsultations'=> $regimen,
			);
			$res = $this->mpendingConsultations->mupdatependingConsultations($idpendingConsultations, $data);

			if ($res) {
				$this->session->set_flashdata('success', 'Se Guardó Correctamente');
				redirect(base_url() . '/mantenimiento/cpendingConsultations');
			} else {

				$this->session->set_flashdata('error', 'No se puedo Actulizar la pendingConsultations ');
				redirect(base_url() . '/mantenimiento/cpendingConsultations/cedit' . $idpendingConsultations);
			}
		// } else {
		// 	$this->session->set_flashdata('error', 'No se pudo guardar la pendingConsultations ');
		// 	$this->cedit($idpendingConsultations);


		// }
	}
	//DELETE 
	// public function cdelete($idpendingConsultations){
	// 	$this->mpendingConsultations->mdeletependingConsultations($idpendingConsultations);
	// 	redirect(base_url() . "mantenimiento/cpendingConsultations");
	// }

	public function cdelete($idpendingConsultations) {
		try {
			$this->mpendingConsultations->mdeletependingConsultations($idpendingConsultations);
			echo "cpendingConsultations";
		} catch (\Exception $e) {
			// Captura la excepción y muestra un mensaje específico
			if ($e->errorInfo[1] == 1451) {
				echo "No se puede eliminar el pendingConsultations. Está asociado a productos.";
			} else {
				echo "Error: " . $e->getMessage();
			}
		}
	}
}
?> 