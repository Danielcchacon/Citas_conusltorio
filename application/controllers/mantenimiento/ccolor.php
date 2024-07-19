<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ccolor extends CI_Controller
{
 private $permisos;
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url() . 'clogin');
		}
		$this->load->model('mcolor');
	}
	public function index()
	{
		$data = array(
			'colorindex' => $this->mcolor->mselectcolor(),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/color/vlist', $data);
		$this->load->view('layouts/footer');
	}
	//insert
	public function cadd()
	{

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/color/vadd');
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
			$res = $this->mcolor->minsertcolor($data);
			if ($res) {
				$this->session->set_flashdata('success', 'Guardo Correctamente');
				redirect(base_url() . 'mantenimiento/ccolor');
			} else {
				$this->session->set_flashdata('error', 'Se no Guardó Registro');
				redirect(base_url() . 'mantenimiento/ccolor/cadd');

			}
		} else {
			$this->session->set_flashdata('error', 'No se puedo guardar la color');
			$this->cadd();
		}



	}

	public function cedit($idcolor){

		$data = array(
			'coloredit' => $this->mcolor->miupdatecolor($idcolor),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/color/vedit', $data);
		$this->load->view('layouts/footer');
	}

	public function cupdate(){

		// $idcolor = $this->input->post('txtidcolor');
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
		// 	$res = $this->mcolor->mupdatecolor($idcolor, $data);

		// 	if ($res) {
		// 		$this->session->set_flashdata('success', 'Se Guardó Correctamente');
		// 		redirect(base_url() . '/mantenimiento/ccolor');
		// 	} else {

		// 		$this->session->set_flashdata('error', 'No se puedo Actulizar la color ');
		// 		redirect(base_url() . '/mantenimiento/ccolor/cedit' . $idcolor);
		// 	}
		// } else {
		// 	$this->session->set_flashdata('error', 'No se pudo guardar la color ');
		// 	$this->cedit($idcolor);


		// }
$idcolor = $this->input->post('txtidcolor');
$nombre = $this->input->post('txtnombre');
$descripcion = $this->input->post('txtdescripcion');
$estado = $this->input->post('txtestado');
$colorActual = $this->mcolor->miupdatecolor($idcolor);

if ($nombre == $colorActual->nombre) {
	$unique = '';
} else {

	$unique = '|is_unique[color.codigo]';
}
$this->form_validation->set_rules('txtnombre', 'nombre', 'required' . $unique);

if ($this->form_validation->run()) {
    $data = array(
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'estado' => $estado,
        'idcomercio' => $this->session->userdata('idcomercio'),
    );
    $res = $this->mcolor->mupdatecolor($idcolor, $data);

    if ($res) {
        $this->session->set_flashdata('success', 'Se actulizo correctamente');
        redirect(base_url() . '/mantenimiento/ccolor');
    } else {
        $this->session->set_flashdata('error', 'No se pudo actualizar el color');
        redirect(base_url() . '/mantenimiento/ccolor/cedit/' . $idcolor);
    }

} else {
	$this->session->set_flashdata('error', 'No se pudo guardar la proveedor ');
	$this->cedit($idcolor);


}
	}
	
	public function cdelete($idcolor) {
		try {
			$this->mcolor->mdeletecolor($idcolor);
			echo "ccolor";
		} catch (\Exception $e) {
			// Captura la excepción y muestra un mensaje específico
			if ($e->errorInfo[1] == 1451) {
				echo "No se puede eliminar el color. Está asociado a productos.";
			} else {
				echo "Error: " . $e->getMessage();
			}
		}
	}
	
	
}
?>