<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cinventario extends CI_Controller
{
 private $permisos;
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url() . 'clogin');
		}
		$this->load->model('minventario');
	}
	public function index()
	{
		$data = array(
			'inventarioindex' => $this->minventario->mselectinventario(),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/inventario/vlist', $data);
		$this->load->view('layouts/footer');
	}
	//insert
	public function cadd()
	{

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/inventario/vadd');
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
				'idcomercio'=>$this->session->userdata('idcomercio')
			);
			$res = $this->minventario->minsertinventario($data);
			if ($res) {
				$this->session->set_flashdata('success', 'Guardo Correctamente');
				redirect(base_url() . 'mantenimiento/cinventario');
			} else {
				$this->session->set_flashdata('error', 'Se no Guardó Registro');
				redirect(base_url() . 'mantenimiento/cinventario/cadd');

			}      
		} else {
			$this->session->('error', 'No se puedo guardar la inventario');
			$this->cadd();
		}



	}

	public function cedit($idinventario){

		$data = array(
			'inventarioedit' => $this->minventario->miupdateinventario($idinventario),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/inventario/vedit', $data);
		$this->load->view('layouts/footer');
	}

	public function cupdate(){

		// $idinventario = $this->input->post('txtidinventario');
		// $nombre = $this->input->post('txtnombre');
		// $descripcion = $this->input->post('txtdescripcion');
		// $estado = $this->input->post('txtestado');

	

		// if ($this->form_validation->run()) {
		// 	$data = array(
		// 		'nombre' => $nombre,
		// 		'descripcion' => $descripcion,
		// 		'estado' => $estado,
		// 		'idcomercio'=>$this->session->userdata('idcomercio'),
		// 	);
		// 	$res = $this->minventario->mupdateinventario($idinventario, $data);

		// 	if ($res) {
		// 		$this->session->set_flashdata('success', 'Se Guardó Correctamente');
		// 		redirect(base_url() . '/mantenimiento/cinventario');
		// 	} else {

		// 		$this->session->set_flashdata('error', 'No se puedo Actulizar la inventario ');
		// 		redirect(base_url() . '/mantenimiento/cinventario/cedit' . $idinventario);
		// 	}
		// } else {
		// 	$this->session->set_flashdata('error', 'No se pudo guardar la inventario ');
		// 	$this->cedit($idinventario);


		// }
$idinventario = $this->input->post('txtidinventario');
$nombre = $this->input->post('txtnombre');
$descripcion = $this->input->post('txtdescripcion');
$estado = $this->input->post('txtestado');
$inventarioActual = $this->minventario->miupdateinventario($idinventario);

if ($nombre == $inventarioActual->nombre) {
	$unique = '';
} else {

	$unique = '|is_unique[inventario.codigo]';
}
$this->form_validation->set_rules('txtnombre', 'nombre', 'required' . $unique);

if ($this->form_validation->run()) {
    $data = array(
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'estado' => $estado,
        'idcomercio' => $this->session->userdata('idcomercio'),
    );
    $res = $this->minventario->mupdateinventario($idinventario, $data);

    if ($res) {
        $this->session->set_flashdata('success', 'Se actulizo correctamente');
        redirect(base_url() . '/mantenimiento/cinventario');
    } else {
        $this->session->set_flashdata('error', 'No se pudo actualizar el inventario');
        redirect(base_url() . '/mantenimiento/cinventario/cedit/' . $idinventario);
    }

} else {
	$this->session->set_flashdata('error', 'No se pudo guardar la proveedor ');
	$this->cedit($idinventario);


}
	}
	
	public function cdelete($idinventario) {
		try {
			$this->minventario->mdeleteinventario($idinventario);
			echo "cinventario";
		} catch (\Exception $e) {
			// Captura la excepción y muestra un mensaje específico
			if ($e->errorInfo[1] == 1451) {
				echo "No se puede eliminar el inventario. Está asociado a productos.";
			} else {
				echo "Error: " . $e->getMessage();
			}
		}
	}
	
	
}
?>