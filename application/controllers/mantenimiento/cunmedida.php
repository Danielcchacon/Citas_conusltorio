<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cunmedida extends CI_Controller
{
 private $permisos;
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url() . 'clogin');
		}
		$this->load->model('munmedida');
	}
	public function index()
	{
		$data = array(
			'unmedidaindex' => $this->munmedida->mselectunmedida(),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/unmedida/vlist', $data);
		$this->load->view('layouts/footer');
	}
	//insert
	public function cadd()
	{

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/unmedida/vadd');
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
			$res = $this->munmedida->minsertunmedida($data);
			if ($res) {
				$this->session->set_flashdata('success', 'Guardo Correctamente');
				redirect(base_url() . 'mantenimiento/cunmedida');
			} else {
				$this->session->set_flashdata('error', 'Se no Guardó Registro');
				redirect(base_url() . 'mantenimiento/cunmedida/cadd');

			}
		} else {
			$this->session->set_flashdata('error', 'No se puedo guardar la unmedida');
			$this->cadd();
		}



	}

	public function cedit($idunmedida){

		$data = array(
			'unmedidaedit' => $this->munmedida->miupdateunmedida($idunmedida),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/unmedida/vedit', $data);
		$this->load->view('layouts/footer');
	}

	public function cupdate(){

		// $idunmedida = $this->input->post('txtidunmedida');
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
		// 	$res = $this->munmedida->mupdateunmedida($idunmedida, $data);

		// 	if ($res) {
		// 		$this->session->set_flashdata('success', 'Se Guardó Correctamente');
		// 		redirect(base_url() . '/mantenimiento/cunmedida');
		// 	} else {

		// 		$this->session->set_flashdata('error', 'No se puedo Actulizar la unmedida ');
		// 		redirect(base_url() . '/mantenimiento/cunmedida/cedit' . $idunmedida);
		// 	}
		// } else {
		// 	$this->session->set_flashdata('error', 'No se pudo guardar la unmedida ');
		// 	$this->cedit($idunmedida);


		// }
$idunmedida = $this->input->post('txtidunmedida');
$nombre = $this->input->post('txtnombre');
$descripcion = $this->input->post('txtdescripcion');
$estado = $this->input->post('txtestado');





    $data = array(
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'estado' => $estado,
        'idcomercio' => $this->session->userdata('idcomercio'),
    );
    $res = $this->munmedida->mupdateunmedida($idunmedida, $data);

    if ($res) {
        $this->session->set_flashdata('success', 'Se actulizo correctamente');
        redirect(base_url() . '/mantenimiento/cunmedida');
    } else {
        $this->session->set_flashdata('error', 'No se pudo actualizar el unmedida');
        redirect(base_url() . '/mantenimiento/cunmedida/cedit/' . $idunmedida);
    }





	}
	//DELETE 
	// public function cdelete($idunmedida){
	// 	try {
	// 	$this->munmedida->mdeleteunmedida($idunmedida);
	// 	echo "cunmedida";
	// 	} catch (Exception $e) {

	// 		echo "erro". $e->getMessage() ."";
	// 	}
		
	// }
	// public function cdelete($idunmedida) {
	// 	try {

	// 		$this->munmedida->mdeleteunmedida($idunmedida);
	// 		echo "cunmedida";

	// 	} catch (Exception $e) {
	// 		echo "error";
	// 	}
	
		
	// }
	public function cdelete($idunmedida) {
		try {
			$this->munmedida->mdeleteunmedida($idunmedida);
			echo "cunmedida";
		} catch (\Exception $e) {
			// Captura la excepción y muestra un mensaje específico
			if ($e->errorInfo[1] == 1451) {
				echo "No se puede eliminar el unmedida. Está asociado a productos.";
			} else {
				echo "Error: " . $e->getMessage();
			}
		}
	}
	
	
}
?>