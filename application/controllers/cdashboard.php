<?php

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
			'tipodeconsulta' => $this->mcombo->mcombotable('tipo_consulta'),

			
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/vdashboard', $data);
		$this->load->view('layouts/footer');
	
		
	}

	public function caddcita() {
		$id_medico = $this->input->post('txtmedico');
		$id_paciente = $this->input->post('txtpaciente');
		$id_tipo_consulta = $this->input->post('txtconsulta');
		$horayfecha = $this->input->post('fecha_hora');

		log_message('info', 'Medico ID: ' . $id_medico);
        log_message('info', 'Paciente ID: ' . $id_paciente);
        log_message('info', 'Tipo de Consulta ID: ' . $id_tipo_consulta);
        log_message('info', 'Fecha y Hora: ' . $horayfecha);
		$result = $this->mdashboard->minsertcita($id_medico, $id_paciente, $id_tipo_consulta, $horayfecha);
	
		// Check result and perform necessary actions
		if ($result ==="Consulta agregada exitosamente.") {
			$this->session->set_flashdata('success', 'Guardo Correctamente');
				redirect(base_url() . 'cdashboard');
		}else{
			$this->session->set_flashdata('error', $result);
			redirect(base_url() . 'cdashboard');
		}
	
		// Redirect or load a view
	}
	public function cdelete($idconsulta)
{
    try {
        // Llama al método del modelo para eliminar la consulta
        $this->mdashboard->mdeletedashboard($idconsulta);
        
        // Establece un mensaje de éxito en la sesión
        $this->session->set_flashdata('success', 'Se cancelo la consulta correctamente');
        
        // Redirige al usuario al dashboard
        redirect(base_url() . 'cdashboard');
    } catch (\Exception $e) {
        // Captura la excepción y muestra un mensaje específico
        if (isset($e->errorInfo[1]) && $e->errorInfo[1] == 1451) {
            // Establece un mensaje de error en la sesión
            $this->session->set_flashdata('error', 'No se puede eliminar la consulta. Está asociada a otros registros.');
        } else {
            // Establece un mensaje genérico de error en la sesión
            $this->session->set_flashdata('error', 'Error: ' . $e->getMessage());
        }
        
        // Redirige al usuario al dashboard
        redirect(base_url() . 'cdashboard');
    }
}

}
?>