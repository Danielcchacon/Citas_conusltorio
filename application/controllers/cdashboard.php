<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cdashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
	if(!$this->session->userdata('login')){
		redirect(base_url().'clogin');
	 } 
	 $this->load->model('mdashboard');
	 $this->load->model('mcombo');

	}
	public function index()
	{
		$data = array(
			'citasindex' => $this->mdashboard->mselectdashboard(),
			'medicocombo' => $this->mcombo->mcombotable('medico'),
			'pacientecombo' => $this->mcombo->mcombotable('paciente'),
			'' => $this->mcombo->mcombotable('paciente'),

			
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/vdashboard', $data);
		$this->load->view('layouts/footer');
	
		
	}

	public function caddcita() {
		$id_medico = $this->input->post('id_medico');
		$id_paciente = $this->input->post('id_paciente');
		$id_tipo_consulta = $this->input->post('id_tipo_consulta');
		$horayfecha = $this->input->post('horayfecha');
		$result = $this->mdashboard->minsertcita($id_medico, $id_paciente, $id_tipo_consulta, $horayfecha);
	
		// Check result and perform necessary actions
		if ($result) {
			$this->session->set_flashdata('success', 'Guardo Correctamente');
				redirect(base_url() . 'cdashboard');
		}else{
			$this->session->set_flashdata('error', 'Guardo Correctamente');
		}
	
		// Redirect or load a view
	}
	
}
?>