<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ccategoria extends CI_Controller
{
 private $permisos;
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url() . 'clogin');
		}
		$this->load->model('mcategoria');
	}
	public function index(){

		$data = array(
			'categoriaindex' => $this->mcategoria->mselectcategoria(),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/categoria/vlist', $data);
		$this->load->view('layouts/footer');
	}

	public function cproductcategoria($idCategoria){

		$data = array(
			'categoriaproducto' => $this->mcategoria->mproductcategoria($idCategoria),
		);
		
	}

	//insert
	public function cadd(){

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/categoria/vadd');
		$this->load->view('layouts/footer');

	}
	public function cinsert()
	{
		$codigo = $this->input->post('txtcodigo');
		$nombre = $this->input->post('txtnombre');
		$descripcion = $this->input->post('txtdescripcion');

		//validaciones
		// $this->form_validation->set_rules('txtcodigo', 'El código ya existe', 'required|is_unique[categoria.codigo]');
		$this->form_validation->set_rules(
			'txtcodigo',
			'El código ya existe',
			'required|is_unique[categoria.codigo]',
			array('is_unique' => 'El código ya existe debe ser un valor único.')
		);
		
		
		if ($this->form_validation->run()) {
			$data = array(
				'codigo' => $codigo,
				'nombre' => $nombre,
				'descripcion' => $descripcion,
				'estado' => '1',
				'idcomercio'=>$this->session->userdata('idcomercio'),
				
			);
			$res = $this->mcategoria->minsertcategoria($data);
			if ($res) {
				$this->session->set_flashdata('success', 'Guardo Correctamente');
				redirect(base_url() . 'mantenimiento/ccategoria');
			} else {
				$this->session->set_flashdata('error', 'Se no Guardó Registro');
				redirect(base_url() . 'mantenimiento/ccategoria/cadd');

			}
		} else {
			$this->session->set_flashdata('error', 'No se puedo guardar la categoria');
			$this->cadd();
		}



	}

	public function cedit($idcategoria){

		$data = array(
			'categoriaedit' => $this->mcategoria->miupdatecategoria($idcategoria),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/categoria/vedit', $data);
		$this->load->view('layouts/footer');
	}

	public function cupdate(){

		$idcategoria = $this->input->post('txtidcategoria');
		$codigo = $this->input->post('txtcodigo');
		$nombre = $this->input->post('txtnombre');
		$descripcion = $this->input->post('txtdescripcion');
		$estado = $this->input->post('txtestado');

		$categoriaActual = $this->mcategoria->miupdatecategoria($idcategoria);
		// var_dump($categoriaActual);



		if ($codigo == $categoriaActual->codigo) {
			$unique = '';
		} else {

			$unique = '|is_unique[categoria.codigo]';
		}
		$this->form_validation->set_rules('txtcodigo', 'codigo', 'required' . $unique);

		if ($this->form_validation->run()) {
			$data = array(
				'codigo' => $codigo,
				'nombre' => $nombre,
				'descripcion' => $descripcion,
				'estado' => $estado,
				// 'idcomercio' =>
			);
			$res = $this->mcategoria->mupdatecategoria($idcategoria, $data);

			if ($res) {
				$this->session->set_flashdata('success', 'Se Guardó Correctamente');
				redirect(base_url() . '/mantenimiento/ccategoria');
			} else {

				$this->session->set_flashdata('error', 'No se puedo Actulizar la Categoria ');
				redirect(base_url() . '/mantenimiento/ccategoria/cedit' . $idcategoria);
			}
		} else {
			$this->session->set_flashdata('error', 'No se pudo guardar la Categoria ');
			$this->cedit($idcategoria);


		}
	}
	//DELETE 
	public function cdelete($idCategoria){
		$this->mcategoria->mdeletecategoria($idCategoria);
		
		echo "ccategoria";
	}
}
?>