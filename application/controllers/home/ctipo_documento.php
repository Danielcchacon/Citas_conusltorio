<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ctipo_documento extends CI_Controller
{
 private $permisos;
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url() . 'clogin');
		}
		$this->load->model('mtipo_documento');
	}
	public function index()
	{
		$data = array(
			'tipo_documentoindex' => $this->mtipo_documento->mselecttipo_documento(),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/tipo_documento/vlist', $data);
		$this->load->view('layouts/footer');
	}
	//insert
	public function cadd()
	{

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/tipo_documento/vadd');
		$this->load->view('layouts/footer');

	}
	public function cinsert()
	{
		// $codigo = $this->input->post('txtcodigo');
		$nombre = $this->input->post('txtnombre');
		$descripcion = $this->input->post('txtdescripcion');

		//validaciones
		// $this->form_validation->set_rules('txtcodigo', 'el código', 'required|is_unique[tipo_documento.codigo]');
		// if ($this->form_validation->run()) {
			$data = array(
				// 'codigo' => $codigo,
				'nombre' => $nombre,
				'descripcion' => $descripcion,
				'estado' => '1',
				'idcomercio'=>$this->session->userdata('idcomercio')
			);
			$res = $this->mtipo_documento->minserttipo_documento($data);
			if ($res) {
				$this->session->set_flashdata('success', 'Guardo Correctamente');
				redirect(base_url() . 'mantenimiento/ctipo_documento');
			} else {
				$this->session->set_flashdata('error', 'Se no Guardó Registro');
				redirect(base_url() . 'mantenimiento/ctipo_documento/cadd');

			}
		// } else {
		// 	$this->session->set_flashdata('error', 'No se puedo guardar la tipo_documento');
		// 	$this->cadd();
		// }



	}

	public function cedit($idtipo_documento){

		$data = array(
			'tipo_documentoedit' => $this->mtipo_documento->miupdatetipo_documento($idtipo_documento),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/tipo_documento/vedit', $data);
		$this->load->view('layouts/footer');
	}

	public function cupdate(){

		$idtipo_documento = $this->input->post('txtidtipo_documento');
		// $codigo = $this->input->post('txtcodigo');
		$nombre = $this->input->post('txtnombre');
		$descripcion = $this->input->post('txtdescripcion');
		$estado = $this->input->post('txtestado');

		// $tipo_documentoActual = $this->mtipo_documento->miupdatetipo_documento($idtipo_documento);
		// var_dump($tipo_documentoActual);



		// if ($codigo == $tipo_documentoActual->codigo) {
		// 	$unique = '';
		// } else {

		// 	$unique = '|is_unique[tipo_documento.codigo]';
		// }
		// $this->form_validation->set_rules('txtcodigo', 'codigo', 'required' . $unique);

		// if ($this->form_validation->run()) {
			$data = array(
				'nombre' => $nombre,
				'descripcion' => $descripcion,
				'estado' => $estado,
				'idcomercio' => $this->session->userdata('idcomercio'),
				
			);
			$res = $this->mtipo_documento->mupdatetipo_documento($idtipo_documento, $data);

			if ($res) {
				$this->session->set_flashdata('success', 'Se Guardó Correctamente');
				redirect(base_url() . '/mantenimiento/ctipo_documento');
			} else {

				$this->session->set_flashdata('error', 'No se puedo Actulizar la tipo_documento ');
				redirect(base_url() . '/mantenimiento/ctipo_documento/cedit' . $idtipo_documento);
			}
		// } else {
		// 	$this->session->set_flashdata('error', 'No se pudo guardar la tipo_documento ');
		// 	$this->cedit($idtipo_documento);


		// }
	}
	//DELETE 
	
	public function cdelete($idtipo_documento) {
		try {
			$this->mtipo_documento->mdeletetipo_documento($idtipo_documento);
			echo "ctipo_documento";
		} catch (\Exception $e) {
			// Captura la excepción y muestra un mensaje específico
			if ($e->errorInfo[1] == 1451) {
				echo "No se puede eliminar el tipo_documento. Está asociado a productos.";
			} else {
				echo "Error: " . $e->getMessage();
			}
		}
	}
}
?>