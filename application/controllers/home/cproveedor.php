<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cproveedor extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url() . 'clogin');
		}
		$this->load->model('mproveedor');
		$this->load->model('mcombo');
	}
	public function index()
	{
		$data = array(
			'proveedorindex' => $this->mproveedor->mselectproveedor(),
			
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/proveedor/vlist', $data);
		$this->load->view('layouts/footer');
	}
	//insert
	public function cadd()
	{

		$data = array(
			
			'tipo_documentocombo' => $this->mcombo->mcombotable('tipo_documento'),
			'tipo_proveedorcombo' => $this->mcombo->mcombotable('tipo_cliente'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/proveedor/vadd',$data);
		$this->load->view('layouts/footer');

	}
	public function cinsert()
	{
		$idtipo_documento = $this->input->post('txttipo_documento');
		$idtipo_proveedor = $this->input->post('txttipo_proveedor');
		$codigo = $this->input->post('txtcodigo');
		$nombre = $this->input->post('txtnombre');
		$direccion = $this->input->post('txtdireccion');
		$telefono = $this->input->post('txttelefono');
		//validaciones
		// $this->form_validation->set_rules('txtcodigo', 'el código', 'required|is_unique[proveedor.codigo]');
		// $this->form_validation->set_rules('txttelefono', 'Telefono', 'required');

		// if ($this->form_validation->run()) {
			$data = array(
				'idtipo_documento' => $idtipo_documento,
				'idtipo_cliente'   => $idtipo_proveedor,
				'codigo' 		   => $codigo,
				'nombre'			=> $nombre,
				'direccion' => $direccion,
				'telefono'=> $telefono,
				'estado' => '1',
				'idcomercio' => $this->session->userdata('idcomercio'),
			);
			$res = $this->mproveedor->minsertproveedor($data);
			if ($res) {
				$this->session->set_flashdata('success', 'Guardo Correctamente');
				redirect(base_url() . 'mantenimiento/cproveedor');
			// } else {
			// 	$this->session->set_flashdata('error', 'Se no Guardó Registro');
			// 	redirect(base_url() . 'mantenimiento/cproveedor/cadd');

			// }
		} else {
			$this->session->set_flashdata('error', 'No se puedo guardar la proveedor');
			$this->cadd();
		}



	}

	public function cedit($idproveedor){

		$data = array(
			'proveedoredit' => $this->mproveedor->miupdateproveedor($idproveedor),
			'tipo_documentocombo' => $this->mcombo->mcombotable('tipo_documento'),
			'tipo_proveedorcombo' => $this->mcombo->mcombotable('tipo_cliente'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/proveedor/vedit', $data);
		$this->load->view('layouts/footer');

	}

	public function cupdate(){

		$idproveedor = $this->input->post('txtidproveedor');
		$idtipo_documento = $this->input->post('txttipo_documento');
		$idtipo_proveedor = $this->input->post('txttipo_proveedor');
		$codigo = $this->input->post('txtcodigo');
		$nombre = $this->input->post('txtnombre');
		$direccion = $this->input->post('txtdireccion');
		$telefono = $this->input->post('txttelefono');
		$estado = $this->input->post('txtestado');

		$proveedorActual = $this->mproveedor->miupdateproveedor($idproveedor);
		// var_dump($proveedorActual);



		// if ($codigo == $proveedorActual->codigo) {
		// 	$unique = '';
		// } else {

		// 	$unique = '|is_unique[proveedor.codigo]';
		// }
		// $this->form_validation->set_rules('txtcodigo', 'codigo', 'required' . $unique);

		// if ($this->form_validation->run()) {
			$data = array(
				'idtipo_documento' => $idtipo_documento,
				'codigo' => $codigo,
				'idtipo_cliente'   => $idtipo_proveedor,
				'nombre' => $nombre,
				'direccion' => $direccion,
				'telefono'=> $telefono,
				'estado' => $estado,
				'idcomercio' => $this->session->userdata('idcomercio'),
			);
			$res = $this->mproveedor->mupdateproveedor($idproveedor, $data);

			if ($res) {
				$this->session->set_flashdata('success', 'Se Guardó Correctamente');
				redirect(base_url() . '/mantenimiento/cproveedor');
			} else {

				$this->session->set_flashdata('error', 'No se puedo Actulizar la proveedor ');
				redirect(base_url() . '/mantenimiento/cproveedor/cedit' . $idproveedor);
			}
		// } else {
		// 	$this->session->set_flashdata('error', 'No se pudo guardar la proveedor ');
		// 	$this->cedit($idproveedor);


		// }
	}
	//DELETE 
	// public function cdelete($idproveedor){
	// 	$this->mproveedor->mdeleteproveedor($idproveedor);
	// 	redirect(base_url() . "mantenimiento/cproveedor");
	// }

	public function cdelete($idproveedor) {
		try {
			$this->mproveedor->mdeleteproveedor($idproveedor);
			echo "cproveedor";
		} catch (\Exception $e) {
			// Captura la excepción y muestra un mensaje específico
			if ($e->errorInfo[1] == 1451) {
				echo "No se puede eliminar el proveedor. Está asociado a productos.";
			} else {
				echo "Error: " . $e->getMessage();
			}
		}
	}
}
?> 