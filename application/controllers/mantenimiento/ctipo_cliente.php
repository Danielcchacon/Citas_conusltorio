<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ctipo_cliente extends CI_Controller
{
	private $permisos;
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url() . 'clogin');
		}
		$this->load->model('mtipo_cliente');
	}
	public function index()
	{
		$data = array(
			'tipo_clienteindex' => $this->mtipo_cliente->mselecttipo_cliente(),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/tipo_cliente/vlist', $data);
		$this->load->view('layouts/footer');
	}
	//insert
	public function cadd()
	{

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/tipo_cliente/vadd');
		$this->load->view('layouts/footer');

	}
	public function cinsert()
	{

		$nombre = $this->input->post('txtnombre');
		$descripcion = $this->input->post('txtdescripcion');

		//validaciones
		// $this->form_validation->set_rules('txtnombre', 'Nombre', 'required');
		// if ($this->form_validation->run()) {
			$data = array(

				'nombre' => $nombre,
				'descripcion' => $descripcion,
				'estado' => '1',
				'idcomercio'=>$this->session->userdata('idcomercio')
			);
			$res = $this->mtipo_cliente->minserttipo_cliente($data);
			if ($res) {
				$this->session->set_flashdata('success', 'Guardo Correctamente');
				redirect(base_url() . 'mantenimiento/ctipo_cliente');
			} else {
				$this->session->set_flashdata('error', 'Se no Guardó Registro');
				redirect(base_url() . 'mantenimiento/ctipo_cliente/cadd');

			}
		// } else {
		// 	$this->session->set_flashdata('error', 'No se puedo guardar la tipo_cliente');
		// 	$this->cadd();
		// }



	}

	public function cedit($idtipo_cliente)
	{
		$data = array(
			'tipo_clienteedit' => $this->mtipo_cliente->miupdatetipo_cliente($idtipo_cliente),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/tipo_cliente/vedit', $data);
		$this->load->view('layouts/footer');
	}

	public function cupdate()
	{
		$idtipo_cliente = $this->input->post('txtidtipo_cliente');
		$nombre = $this->input->post('txtnombre');
		$descripcion = $this->input->post('txtdescripcion');
		$estado = $this->input->post('txtestado');


		$data = array(
			'nombre' => $nombre,
			'descripcion' => $descripcion,
			'estado' => $estado,
			'idcomercio' => $this->session->userdata('idcomercio'),
		);
		$res = $this->mtipo_cliente->mupdatetipo_cliente($idtipo_cliente, $data);

		if ($res) {
			$this->session->set_flashdata('success', 'Se actulizo correctamente');
			redirect(base_url() . '/mantenimiento/ctipo_cliente');
		} else {
			$this->session->set_flashdata('error', 'No se pudo actualizar el tipo_cliente');
			redirect(base_url() . '/mantenimiento/ctipo_cliente/cedit/' . $idtipo_cliente);
		}


	}
	//DELETE
	public function cdelete($idtipo_cliente) {
		try {
			$this->mtipo_cliente->mdeletetipo_cliente($idtipo_cliente);
			echo "ctipo_cliente";
		} catch (\Exception $e) {
			// Captura la excepción y muestra un mensaje específico
			if ($e->errorInfo[1] == 1451) {
				echo "No se puede eliminar el tipo_cliente. Está asociado a productos.";
			} else {
				echo "Error: " . $e->getMessage();
			}
		}
	}
	

}
?>