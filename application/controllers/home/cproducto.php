<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cproducto extends CI_Controller
{
	private $permisos;
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url() . 'clogin');
		}
		$this->load->model('mproducto');
		$this->load->model('mcombo');
	}
	public function index()
	{
		$data = array(
			'productoindex' => $this->mproducto->mselectproducto(2,0),
		);


		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/producto/vlist', $data);
		$this->load->view('layouts/footer');
	}
	//insert
	public function cadd()
	{
		$data = array(

			'cataegoriacombo' => $this->mcombo->mcombotable('categoria'),
			'tipo_materialcombo' => $this->mcombo->mcombotable('tipo_material'),
			'marcacombo' => $this->mcombo->mcombotable('marca'),
			'unmedidacombo' => $this->mcombo->mcombotable('unmedida'),
			'colorcombo' => $this->mcombo->mcombotable('color'),

		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/producto/vadd', $data);
		$this->load->view('layouts/footer');

	}
	public function cinsert()
	{
		$codigo = $this->input->post('txtcodigo');
		$nombre = $this->input->post('txtnombre');
		$descripcion = $this->input->post('txtdescripcion');
		$precio = $this->input->post('txtprecio');
		$observacion = $this->input->post('txtobservacion');
		$idcomercio = $this->session->userdata('idcomercio');
		$idcategoria = $this->input->post('txtcategoria');
		$idtipo_material = $this->input->post('txttipo_material');
		$idmarca = $this->input->post('txtmarca');
		$idunmedida = $this->input->post('txtunmedida');
		$idcolor = $this->input->post('txtcolor');
		$txtfoto = 'nodisponible.png';
		$this->form_validation->set_rules('txtcodigo', 'el código', 'required|is_unique[producto.codigo]');
		if (empty($_FILES['txtimagen']['name'])) {
			if ($this->form_validation->run()) {
				$data = array(
					'codigo' => $codigo,
					'nombre' => $nombre,
					'descripcion' => $descripcion,
					'imagen' => $txtfoto,
					'precio' => $precio,
					'stock' => '0',
					'observacion' => $observacion,
					'estado' => '1',
					'idcomercio'=>$idcomercio,
					'idcolor' => $idcolor,
					'idcategoria' => $idcategoria,
					'idtipo_material' => $idtipo_material,
					'idmarca' => $idmarca,
					'idunmedida' => $idunmedida,

					
					
				);
				$res = $this->mproducto->minsertproducto($data);
				if ($res) {
					$this->session->set_flashdata('success', 'Guardo Correctamente');
					redirect(base_url() . 'mantenimiento/cproducto');
				} else {
					$this->session->set_flashdata('error', 'Se no Guardó Registro');
					redirect(base_url() . 'mantenimiento/cproducto/cadd');

				}
			} else {
				$this->session->set_flashdata('error', 'No se puedo guardar la producto');
				$this->cadd();
			}
		} else {
			//validaciones
			$config['upload_path'] = './uploads/productos/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('txtimagen')) {
				$foto = $this->upload->data('file_name');
				if ($this->form_validation->run()) {
					$data = array(
						'codigo' => $codigo,
						'nombre' => $nombre,
						'descripcion' => $descripcion,
						'precio' => $precio,
						'imagen' => $foto,
						'stock' => '0',
						'observacion' => $observacion,
						'estado' => '1',
						'idcomercio'=>$idcomercio,
						'idcolor' => $idcolor,
						'idcategoria' => $idcategoria,
						'idtipo_material' => $idtipo_material,
						'idmarca' => $idmarca,
						'idunmedida' => $idunmedida,
						
					


					
					);
					$res = $this->mproducto->minsertproducto($data);
					if ($res) {
						$this->session->set_flashdata('success', 'Guardo Correctamente');
						redirect(base_url() . 'mantenimiento/cproducto');
					} else {
						$this->session->set_flashdata('error', 'Se no Guardó Registro');
						redirect(base_url() . 'mantenimiento/cproducto/cadd');

					}
				} else {
					$this->session->set_flashdata('error', 'No se puedo guardar la producto');
					$this->cadd();
				}


			} else {
				echo $this->upload->display_errors();
			}


		}




	}

	public function cedit($idproducto)
	{

		$data = array(
			'productoedit' => $this->mproducto->miupdateproducto($idproducto),
			'cataegoriacombo' => $this->mcombo->mcombotable('categoria'),
			'tipo_materialcombo' => $this->mcombo->mcombotable('tipo_material'),
			'marcacombo' => $this->mcombo->mcombotable('marca'),
			'unmedidacombo' => $this->mcombo->mcombotable('unmedida'),
			'colorcombo' => $this->mcombo->mcombotable('color'),
		);

		
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/producto/vedit', $data);
		$this->load->view('layouts/footer');
	}

	public function cupdate()
	{

	// $idproducto = $this->input->post('txtidproducto');
	// $codigo = $this->input->post('txtcodigo');
	// $nombre = $this->input->post('txtnombre');
	// $descripcion = $this->input->post('txtdescripcion');
	// $precio = $this->input->post('txtprecio');
	// $observacion = $this->input->post('txtobservacion');
	// $estado = $this->input->post('txtestado');
	// $idcategoria = $this->input->post('txtcategoria');
	// $idtipo_material = $this->input->post('txttipo_material');
	// $idmarca = $this->input->post('txtmarca');
	// $idunmedida = $this->input->post('txtunmedida');
	// $idcolor = $this->input->post('txtcolor');


		
	
	// 	$productoActual = $this->mproducto->miupdateproducto($idproducto);
	



	// 	if ($codigo == $productoActual->codigo) {
	// 		$unique = '';
	// 	} else {

	// 		$unique = '|is_unique[producto.codigo]';
	// 	}
	// 	$this->form_validation->set_rules('txtcodigo', 'codigo', 'required' . $unique);

	// 	if(empty($_FILES['txtimagen']['name'])){
	// 			if ($this->form_validation->run()) {
	// 		$data = array(
			
	// 					'codigo' => $codigo,
	// 					'nombre' => $nombre,
	// 					'descripcion' => $descripcion,
	// 					'precio' => $precio,
	// 					'observacion' => $observacion,
	// 					'estado' => $estado,
	// 					'idcolor' => $idcolor,
	// 					'idcategoria' => $idcategoria,
	// 					'idtipo_material' => $idtipo_material,
	// 					'idmarca' => $idmarca,
	// 					'idunmedida' => $idunmedida,
						
	// 		);
	// 		$res = $this->mproducto->mupdateproducto($idproducto, $data);

	// 		if ($res) {
	// 			$this->session->set_flashdata('success', 'Se Guardó Correctamente');
	// 			redirect(base_url() . '/mantenimiento/cproducto');
	// 		} else {

	// 			$this->session->set_flashdata('error', 'No se puedo Actulizar la producto ');
	// 			redirect(base_url() . '/mantenimiento/cproducto/cedit' . $idproducto);
	// 		}
	// 	} else {
	// 		$this->session->set_flashdata('error', 'No se pudo guardar la producto ');
	// 		$this->cedit($idproducto);


	// 	}
	// 	}else{
	// 		$config['upload_path'] = './uploads/productos/';
	// 		$config['allowed_types'] = 'gif|jpg|png';
	// 		$this->load->library('upload', $config);
	// 		if ($this->upload->do_upload('txtimagen')) {
	// 			$foto = $this->upload->data('file_name');
	// 			$fotoactual = $this->mproducto->miupdateproducto($idproducto);
	// 			if($fotoactual->imagen ='nodisponible.png'){


	// 			}else{
	// 				unlink('./..uploads/productos/'.$fotoactual->imagen);
	// 			}
	// 				if ($this->form_validation->run()) {
	// 		$data = array(
			
	// 					'codigo' => $codigo,
	// 					'nombre' => $nombre,
	// 					'descripcion' => $descripcion,
	// 					'precio' => $precio,
	// 					'imagen' => $foto,
	// 					'observacion' => $observacion,
	// 					'estado' => $estado,
	// 					'idcolor' => $idcolor,
	// 					'idcategoria' => $idcategoria,
	// 					'idtipo_material' => $idtipo_material,
	// 					'idmarca' => $idmarca,
	// 					'idunmedida' => $idunmedida,
						
	// 		);
	// 		$res = $this->mproducto->mupdateproducto($idproducto, $data);

	// 		if ($res) {
	// 			$this->session->set_flashdata('success', 'Se Guardó Correctamente');
	// 			redirect(base_url() . '/mantenimiento/cproducto');
	// 		} else {

	// 			$this->session->set_flashdata('error', 'No se puedo Actulizar la producto ');
	// 			redirect(base_url() . '/mantenimiento/cproducto/cedit' . $idproducto);
	// 		}
	// 	} else {
	// 		$this->session->set_flashdata('error', 'No se pudo guardar la producto ');
	// 		$this->cedit($idproducto);


	// 	}
	// 	}
	// }
	$idproducto = $this->input->post('txtidproducto');
	$codigo = $this->input->post('txtcodigo');
	$nombre = $this->input->post('txtnombre');
	$descripcion = $this->input->post('txtdescripcion');
	$precio = $this->input->post('txtprecio');
	$observacion = $this->input->post('txtobservacion');
	$estado = $this->input->post('txtestado');
	$idcategoria = $this->input->post('txtcategoria');
	$idtipo_material = $this->input->post('txttipo_material');
	$idmarca = $this->input->post('txtmarca');
	$idunmedida = $this->input->post('txtunmedida');
	$idcolor = $this->input->post('txtcolor');
	
	$productoActual = $this->mproducto->miupdateproducto($idproducto);
	
	if ($codigo == $productoActual->codigo) {
		$unique = '';
	} else {
		$unique = '|is_unique[producto.codigo]';
	}
	$this->form_validation->set_rules('txtcodigo', 'codigo', 'required' . $unique);
	
	if (empty($_FILES['txtimagen']['name'])) {
		if ($this->form_validation->run()) {
			$data = array(
				'codigo' => $codigo,
				'nombre' => $nombre,
				'descripcion' => $descripcion,
				'precio' => $precio,
				'observacion' => $observacion,
				'estado' => $estado,
				'idcolor' => $idcolor,
				'idcategoria' => $idcategoria,
				'idtipo_material' => $idtipo_material,
				'idmarca' => $idmarca,
				'idunmedida' => $idunmedida,
			);
			$res = $this->mproducto->mupdateproducto($idproducto, $data);
	
			if ($res) {
				$this->session->set_flashdata('success', 'Se Guardó Correctamente');
				redirect(base_url() . '/mantenimiento/cproducto');
			} else {
				$this->session->set_flashdata('error', 'No se pudo Actualizar la producto');
				redirect(base_url() . '/mantenimiento/cproducto/cedit' . $idproducto);
			}
		} else {
			$this->session->set_flashdata('error', 'No se pudo guardar la producto');
			$this->cedit($idproducto);
		}
	} else {
		$config['upload_path'] = './uploads/productos/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
	
		if ($this->upload->do_upload('txtimagen')) {
			$foto = $this->upload->data('file_name');
			$fotoactual = $this->mproducto->miupdateproducto($idproducto);
	
			if ($fotoactual->imagen != 'nodisponible.png') {
				unlink('./uploads/productos/' . $fotoactual->imagen);
			}
	
			if ($this->form_validation->run()) {
				$data = array(
					'codigo' => $codigo,
					'nombre' => $nombre,
					'descripcion' => $descripcion,
					'precio' => $precio,
					'imagen' => $foto,
					'observacion' => $observacion,
					'estado' => $estado,
					'idcolor' => $idcolor,
					'idcategoria' => $idcategoria,
					'idtipo_material' => $idtipo_material,
					'idmarca' => $idmarca,
					'idunmedida' => $idunmedida,
				);
	
				$res = $this->mproducto->mupdateproducto($idproducto, $data);
	
				if ($res) {
					$this->session->set_flashdata('success', 'Se Guardó Correctamente');
					redirect(base_url() . '/mantenimiento/cproducto');
				} else {
					$this->session->set_flashdata('error', 'No se pudo Actualizar la producto');
					redirect(base_url() . '/mantenimiento/cproducto/cedit' . $idproducto);
				}
			} else {
				$this->session->set_flashdata('error', 'No se pudo guardar la producto');
				$this->cedit($idproducto);
			}
		}
	}
	
	
	}
	//DELETE 
	// public function cdelete($idproducto)
	// {
	// 	$this->mproducto->mdeleteproducto($idproducto);
	// 	$fotoactual = $this->mproducto->miupdateproducto($idproducto);
	// 	unlink('./uploads/productos/' . $fotoactual->imagen);
	// 	redirect(base_url() . "mantenimiento/cproducto");
	// }


	public function cdelete($idproducto) {
		try {
			$this->mproducto->mdeleteproducto($idproducto);
			echo "cproducto";
		} catch (\Exception $e) {
			// Captura la excepción y muestra un mensaje específico
			if ($e->errorInfo[1] == 1451) {
				echo "No se puede eliminar el producto. Está asociado a productos.";
			} else {
				echo "Error: " . $e->getMessage();
			}
		}
	}

}
?>