<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cusuarios extends CI_Controller
{
 private $permisos;
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url() . 'clogin');
		}
		$this->load->model('musuarios');
	}
	public function index(){

		$data = array(
			'usuariosindex' => $this->musuarios->mselectusuarios(),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/vlist', $data);
		$this->load->view('layouts/footer');
	}

	public function cproductusuarios($idusuarios){

		$data = array(
			'usuariosproducto' => $this->musuarios->mproductusuarios($idusuarios),
		);
		
	}

	//insert
	public function cadd(){

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/vadd');
		$this->load->view('layouts/footer');

	}
	public function cinsert()
	{
		$codigo = $this->input->post('txtcodigo');
		$nombre = $this->input->post('txtnombre');
		$descripcion = $this->input->post('txtdescripcion');

		//validaciones
		// $this->form_validation->set_rules('txtcodigo', 'El código ya existe', 'required|is_unique[usuarios.codigo]');
		$this->form_validation->set_rules(
			'txtcodigo',
			'El código ya existe',
			'required|is_unique[usuarios.codigo]',
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
			$res = $this->musuarios->minsertusuarios($data);
			if ($res) {
				$this->session->set_flashdata('success', 'Guardo Correctamente');
				redirect(base_url() . 'mantenimiento/cusuarios');
			} else {
				$this->session->set_flashdata('error', 'Se no Guardó Registro');
				redirect(base_url() . 'mantenimiento/cusuarios/cadd');

			}
		} else {
			$this->session->set_flashdata('error', 'No se puedo guardar la usuarios');
			$this->cadd();
		}



	}

	public function cedit($idusuarios){

		$data = array(
			'usuariosedit' => $this->musuarios->miupdateusuarios($idusuarios),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/vedit', $data);
		$this->load->view('layouts/footer');
	}

	public function cupdate(){

		$idusuarios = $this->input->post('txtidusuarios');
		$codigo = $this->input->post('txtcodigo');
		$nombre = $this->input->post('txtnombre');
		$descripcion = $this->input->post('txtdescripcion');
		$estado = $this->input->post('txtestado');

		$usuariosActual = $this->musuarios->miupdateusuarios($idusuarios);
		// var_dump($usuariosActual);



		if ($codigo == $usuariosActual->codigo) {
			$unique = '';
		} else {

			$unique = '|is_unique[usuarios.codigo]';
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
			$res = $this->musuarios->mupdateusuarios($idusuarios, $data);

			if ($res) {
				$this->session->set_flashdata('success', 'Se Guardó Correctamente');
				redirect(base_url() . '/mantenimiento/cusuarios');
			} else {

				$this->session->set_flashdata('error', 'No se puedo Actulizar la usuarios ');
				redirect(base_url() . '/mantenimiento/usuarios/cedit' . $idusuarios);
			}
		} else {
			$this->session->set_flashdata('error', 'No se pudo guardar la usuarios ');
			$this->cedit($idusuarios);


		}
	}
	//DELETE 
	public function cdelete($idusuarios){
		$this->musuarios->mdeleteusuarios($idusuarios);
		
		echo "cusuarios";
	}
}
?>