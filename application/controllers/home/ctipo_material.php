<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ctipo_material extends CI_Controller
{
 private $permisos;
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url() . 'clogin');
		}
		$this->load->model('mtipo_material');
	}
	public function index()
	{
		$data = array(
			'tipo_materialindex' => $this->mtipo_material->mselecttipo_material(),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/tipo_material/vlist', $data);
		$this->load->view('layouts/footer');
	}
	//insert
	public function cadd()
	{

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/tipo_material/vadd');
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
			$res = $this->mtipo_material->minserttipo_material($data);
			if ($res) {
				$this->session->set_flashdata('success', 'Guardo Correctamente');
				redirect(base_url() . 'mantenimiento/ctipo_material');
			} else {
				$this->session->set_flashdata('error', 'Se no Guardó Registro');
				redirect(base_url() . 'mantenimiento/ctipo_material/cadd');

			}
		} else {
			$this->session->set_flashdata('error', 'No se puedo guardar la tipo_material');
			$this->cadd();
		}



	}

	public function cedit($idtipo_material){

		$data = array(
			'tipo_materialedit' => $this->mtipo_material->miupdatetipo_material($idtipo_material),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/tipo_material/vedit', $data);
		$this->load->view('layouts/footer');
	}

	public function cupdate(){

		// $idtipo_material = $this->input->post('txtidtipo_material');
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
		// 	$res = $this->mtipo_material->mupdatetipo_material($idtipo_material, $data);

		// 	if ($res) {
		// 		$this->session->set_flashdata('success', 'Se Guardó Correctamente');
		// 		redirect(base_url() . '/mantenimiento/ctipo_material');
		// 	} else {

		// 		$this->session->set_flashdata('error', 'No se puedo Actulizar la tipo_material ');
		// 		redirect(base_url() . '/mantenimiento/ctipo_material/cedit' . $idtipo_material);
		// 	}
		// } else {
		// 	$this->session->set_flashdata('error', 'No se pudo guardar la tipo_material ');
		// 	$this->cedit($idtipo_material);


		// }
$idtipo_material = $this->input->post('txtidtipo_material');
$nombre = $this->input->post('txtnombre');
$descripcion = $this->input->post('txtdescripcion');
$estado = $this->input->post('txtestado');
$tipo_materialActual = $this->mtipo_material->miupdatetipo_material($idtipo_material);

if ($nombre == $tipo_materialActual->nombre) {
	$unique = '';
} else {

	$unique = '|is_unique[tipo_material.codigo]';
}
$this->form_validation->set_rules('txtnombre', 'nombre', 'required' . $unique);

if ($this->form_validation->run()) {
    $data = array(
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'estado' => $estado,
        'idcomercio' => $this->session->userdata('idcomercio'),
    );
    $res = $this->mtipo_material->mupdatetipo_material($idtipo_material, $data);

    if ($res) {
        $this->session->set_flashdata('success', 'Se actulizo correctamente');
        redirect(base_url() . '/mantenimiento/ctipo_material');
    } else {
        $this->session->set_flashdata('error', 'No se pudo actualizar el tipo_material');
        redirect(base_url() . '/mantenimiento/ctipo_material/cedit/' . $idtipo_material);
    }

} else {
	$this->session->set_flashdata('error', 'No se pudo guardar la proveedor ');
	$this->cedit($idtipo_material);


}
	}
	//DELETE 
	// public function cdelete($idtipo_material){
	// 	try {
	// 	$this->mtipo_material->mdeletetipo_material($idtipo_material);
	// 	echo "ctipo_material";
	// 	} catch (Exception $e) {

	// 		echo "erro". $e->getMessage() ."";
	// 	}
		
	// }
	// public function cdelete($idtipo_material) {
	// 	try {

	// 		$this->mtipo_material->mdeletetipo_material($idtipo_material);
	// 		echo "ctipo_material";

	// 	} catch (Exception $e) {
	// 		echo "error";
	// 	}
	
		
	// }
	public function cdelete($idtipo_material) {
		try {
			$this->mtipo_material->mdeletetipo_material($idtipo_material);
			echo "ctipo_material";
		} catch (\Exception $e) {
			// Captura la excepción y muestra un mensaje específico
			if ($e->errorInfo[1] == 1451) {
				echo "No se puede eliminar el tipo_material. Está asociado a productos.";
			} else {
				echo "Error: " . $e->getMessage();
			}
		}
	}
	
	
}
?>