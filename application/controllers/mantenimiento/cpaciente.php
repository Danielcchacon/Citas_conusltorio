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
			
			'eps_pacientecombo' => $this->mcombo->mcombotable('eps'),
			'tipo_regimencombo' => $this->mcombo->mcombotable('tipo_regimen'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/paciente/vadd',$data);
		$this->load->view('layouts/footer');

	}
public function cinsert()
{
    $this->load->library('form_validation');

    // Configurar reglas de validación
    $this->form_validation->set_rules('txtnombre', 'Nombre', 'required');
    $this->form_validation->set_rules('txtapellido', 'Apellido', 'required');
    $this->form_validation->set_rules('txtdocumento', 'Documento', 'required|is_unique[paciente.documento_paciente]');
    $this->form_validation->set_rules('txtcorreo', 'Correo', 'required|valid_email|is_unique[paciente.correo_paciente]');
    $this->form_validation->set_rules('txttelefono', 'Telefono', 'required');

    if ($this->form_validation->run() === FALSE) {
        // Si hay errores de validación, vuelve al formulario de agregar
        $this->session->set_flashdata('error', validation_errors());
        $this->cadd();
    } else {
        $idpaciente = $this->input->post('txtidpaciente');
        $nombre = $this->input->post('txtnombre');
        $apellido = $this->input->post('txtapellido');
        $documento = $this->input->post('txtdocumento');
        $telefono = $this->input->post('txttelefono');
        $correo = $this->input->post('txtcorreo');
        $eps_id = $this->input->post('txteps');
        $regimen = $this->input->post('txtregimen');

        $data = array(
            'paciente_id' => $idpaciente,
            'nombres_paciente' => $nombre,
            'apellidos_paciente' => $apellido,
            'documento_paciente' => $documento,
            'telefono_paciente' => $telefono,
            'correo_paciente' => $correo,
            'eps_paciente' => $eps_id,
            'tipo_paciente' => $regimen,
        );

        $res = $this->mpaciente->minsertpaciente($data);

        if ($res) {
            $this->session->set_flashdata('success', 'Guardado Correctamente');
            redirect(base_url() . 'mantenimiento/cpaciente');
        } else {
            $this->session->set_flashdata('error', 'No se pudo guardar el paciente');
            $this->cadd();
        }
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

	public function cupdate()
	{
		$this->load->library('form_validation');
	
		$idpaciente = $this->input->post('txtidpaciente');
		$nombre = $this->input->post('txtnombre');
		$apellido = $this->input->post('txtapellido');
		$documento = $this->input->post('txtdocumento');
		$telefono = $this->input->post('txttelefono');
		$correo = $this->input->post('txtcorreo');
		$eps_id = $this->input->post('txteps');
		$regimen = $this->input->post('txtregimen');
	
		// Configurar reglas de validación
		$this->form_validation->set_rules('txtnombre', 'Nombre', 'required');
		$this->form_validation->set_rules('txtapellido', 'Apellido', 'required');
		$this->form_validation->set_rules('txtdocumento', 'Documento', 'required|callback_check_documento_unique');
		$this->form_validation->set_rules('txtcorreo', 'Correo', 'required|valid_email|callback_check_correo_unique');
		$this->form_validation->set_rules('txttelefono', 'Telefono', 'required');
	
		if ($this->form_validation->run() === FALSE) {
			// Si hay errores de validación, vuelve al formulario de edición
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url() . '/mantenimiento/cpaciente/cedit/' . $idpaciente);
		} else {
			$data = array(
				'nombres_paciente' => $nombre,
				'apellidos_paciente' => $apellido,
				'documento_paciente' => $documento,
				'correo_paciente' => $correo,
				'telefono_paciente' => $telefono,
				'eps_paciente' => $eps_id,
				'tipo_paciente' => $regimen,
			);
	
			$res = $this->mpaciente->mupdatepaciente($idpaciente, $data);
	
			if ($res) {
				$this->session->set_flashdata('success', 'Se Guardó Correctamente');
				redirect(base_url() . '/mantenimiento/cpaciente');
			} else {
				$this->session->set_flashdata('error', 'No se pudo actualizar el paciente');
				redirect(base_url() . '/mantenimiento/cpaciente/cedit/' . $idpaciente);
			}
		}
	}
	
	// Callback para validar documento único
	public function check_documento_unique($documento)
	{
		$idpaciente = $this->input->post('txtidpaciente');
		$this->db->where('documento_paciente', $documento);
		$this->db->where('paciente_id !=', $idpaciente);
		$query = $this->db->get('paciente'); // Ajusta el nombre de la tabla si es necesario
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('check_documento_unique', 'El documento ya está registrado');
			return FALSE;
		}
		return TRUE;
	}
	
	// Callback para validar correo único
	public function check_correo_unique($correo)
	{
		$idpaciente = $this->input->post('txtidpaciente');
		$this->db->where('correo_paciente', $correo);
		$this->db->where('paciente_id !=', $idpaciente);
		$query = $this->db->get('paciente'); // Ajusta el nombre de la tabla si es necesario
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('check_correo_unique', 'El correo ya está registrado');
			return FALSE;
		}
		return TRUE;
	}
	
	

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