<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ccliente extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url() . 'clogin');
		}
		$this->load->model('mcliente');
		$this->load->model('mcombo');
	}
	public function index()
	{
		$data = array(
			'clienteindex' => $this->mcliente->mselectcliente(),
			
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/cliente/vlist', $data);
		$this->load->view('layouts/footer');
	}
	//insert
	public function cadd()
	{

		$data = array(
			
			'tipo_documentocombo' => $this->mcombo->mcombotable('tipo_documento'),
			'tipo_clientecombo' => $this->mcombo->mcombotable('tipo_cliente'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/cliente/vadd',$data);
		$this->load->view('layouts/footer');

	}
	public function cinsert()
	{
		$idtipo_documento = $this->input->post('txttipo_documento');
		$idtipo_cliente = $this->input->post('txttipo_cliente');
		$codigo = $this->input->post('txtcodigo');
		$nombre = $this->input->post('txtnombre');
		$direccion = $this->input->post('txtdireccion');
		$telefono = $this->input->post('txttelefono');
		//validaciones
		// $this->form_validation->set_rules('txtcodigo', 'el código', 'required|is_unique[cliente.codigo]');
		// $this->form_validation->set_rules('txttelefono', 'Telefono', 'required');

		// if ($this->form_validation->run()) {
			$data = array(
				'idtipo_documento' => $idtipo_documento,
				'idtipo_cliente'   => $idtipo_cliente,
				'codigo' 		   => $codigo,
				'nombre'			=> $nombre,
				'direccion' => $direccion,
				'telefono'=> $telefono,
				'estado' => '1',
				'idcomercio' => $this->session->userdata('idcomercio'),
			);
			$res = $this->mcliente->minsertcliente($data);
			if ($res) {
				$this->session->set_flashdata('success', 'Guardo Correctamente');
				redirect(base_url() . 'mantenimiento/ccliente');
			// } else {
			// 	$this->session->set_flashdata('error', 'Se no Guardó Registro');
			// 	redirect(base_url() . 'mantenimiento/ccliente/cadd');

			// }
		} else {
			$this->session->set_flashdata('error', 'No se puedo guardar la cliente');
			$this->cadd();
		}



	}

	public function cedit($idcliente){

		$data = array(
			'clienteedit' => $this->mcliente->miupdatecliente($idcliente),
			'tipo_documentocombo' => $this->mcombo->mcombotable('tipo_documento'),
			'tipo_clientecombo' => $this->mcombo->mcombotable('tipo_cliente'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/cliente/vedit', $data);
		$this->load->view('layouts/footer');

	}

	public function cupdate(){

		$idcliente = $this->input->post('txtidcliente');
		$idtipo_documento = $this->input->post('txttipo_documento');
		$idtipo_cliente = $this->input->post('txttipo_cliente');
		$codigo = $this->input->post('txtcodigo');
		$nombre = $this->input->post('txtnombre');
		$direccion = $this->input->post('txtdireccion');
		$telefono = $this->input->post('txttelefono');
		$estado = $this->input->post('txtestado');

		$clienteActual = $this->mcliente->miupdatecliente($idcliente);
		// var_dump($clienteActual);



		// if ($codigo == $clienteActual->codigo) {
		// 	$unique = '';
		// } else {

		// 	$unique = '|is_unique[cliente.codigo]';
		// }
		// $this->form_validation->set_rules('txtcodigo', 'codigo', 'required' . $unique);

		// if ($this->form_validation->run()) {
			$data = array(
				'idtipo_documento' => $idtipo_documento,
				'codigo' => $codigo,
				'idtipo_cliente'   => $idtipo_cliente,
				'nombre' => $nombre,
				'direccion' => $direccion,
				'telefono'=> $telefono,
				'estado' => $estado,
				'idcomercio' => $this->session->userdata('idcomercio'),
			);
			$res = $this->mcliente->mupdatecliente($idcliente, $data);

			if ($res) {
				$this->session->set_flashdata('success', 'Se Guardó Correctamente');
				redirect(base_url() . '/mantenimiento/ccliente');
			} else {

				$this->session->set_flashdata('error', 'No se puedo Actulizar la cliente ');
				redirect(base_url() . '/mantenimiento/ccliente/cedit' . $idcliente);
			}
		// } else {
		// 	$this->session->set_flashdata('error', 'No se pudo guardar la cliente ');
		// 	$this->cedit($idcliente);


		// }
	}
	//DELETE 
	// public function cdelete($idcliente){
	// 	$this->mcliente->mdeletecliente($idcliente);
	// 	redirect(base_url() . "mantenimiento/ccliente");
	// }

	public function cdelete($idcliente) {
		try {
			$this->mcliente->mdeletecliente($idcliente);
			echo "ccliente";
		} catch (\Exception $e) {
			// Captura la excepción y muestra un mensaje específico
			if ($e->errorInfo[1] == 1451) {
				echo "No se puede eliminar el cliente. Está asociado a productos.";
			} else {
				echo "Error: " . $e->getMessage();
			}
		}
	}
}
?> 