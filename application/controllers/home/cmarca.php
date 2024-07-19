<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cmarca extends CI_Controller
{
	private $permisos;
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url() . 'clogin');
		}
		$this->load->model('mmarca');
	}
	public function index()
	{
		$data = array(
			'marcaindex' => $this->mmarca->mselectmarca(),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/marca/vlist', $data);
		$this->load->view('layouts/footer');
	}
	//insert
	public function cadd()
	{

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/marca/vadd');
		$this->load->view('layouts/footer');

	}
	public function cinsert()
	{

		$nombre = $this->input->post('txtnombre');
		$descripcion = $this->input->post('txtdescripcion');

		//validaciones
		$this->form_validation->set_rules('txtnombre', 'Nombre', 'required');
		if ($this->form_validation->run()) {
			$data = array(

				'nombre' => $nombre,
				'descripcion' => $descripcion,
				'estado' => '1',
				'idcomercio' => $this->session->userdata('idcomercio')
			);
			$res = $this->mmarca->minsertmarca($data);
			if ($res) {
				$this->session->set_flashdata('success', 'Guardo Correctamente');
				redirect(base_url() . 'mantenimiento/cmarca');
			} else {
				$this->session->set_flashdata('error', 'Se no Guardó Registro');
				redirect(base_url() . 'mantenimiento/cmarca/cadd');

			}
		} else {
			$this->session->set_flashdata('error', 'No se puedo guardar la marca');
			$this->cadd();
		}



	}

	public function cedit($idmarca)
	{

		$data = array(
			'marcaedit' => $this->mmarca->miupdatemarca($idmarca),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/marca/vedit', $data);
		$this->load->view('layouts/footer');
	}

	public function cupdate()
	{


		$idmarca = $this->input->post('txtidmarca');
		$nombre = $this->input->post('txtnombre');
		$descripcion = $this->input->post('txtdescripcion');
		$estado = $this->input->post('txtestado');


		$data = array(
			'nombre' => $nombre,
			'descripcion' => $descripcion,
			'estado' => $estado,
			'idcomercio' => $this->session->userdata('idcomercio'),
		);
		$res = $this->mmarca->mupdatemarca($idmarca, $data);

		if ($res) {
			$this->session->set_flashdata('success', 'Se actulizo correctamente');
			redirect(base_url() . '/mantenimiento/cmarca');
		} else {
			$this->session->set_flashdata('error', 'No se pudo actualizar el marca');
			redirect(base_url() . '/mantenimiento/cmarca/cedit/' . $idmarca);
		}


	}
	//DELETE
	public function cdelete($idmarca)
	{
		try {
			$this->mmarca->mdeletemarca($idmarca);
			echo "cmarca";
		} catch (\Exception $e) {
			// Captura la excepción y muestra un mensaje específico
			if ($e->errorInfo[1] == 1451) {
				echo "No se puede eliminar el marca. Está asociado a productos.";
			} else {
				echo "Error: " . $e->getMessage();
			}
		}
	}


}
?>