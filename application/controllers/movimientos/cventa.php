<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cventa extends CI_Controller
{
 private $permisos;
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url() . 'clogin');
		}
		$this->load->model('mventa');
		$this->load->model('mcombo');
		$this->load->model('mproducto');
	}
	public function index()
	{
		$data = array(
			'ventaindex' => $this->mventa->mselectventa(),
			'cataegoriacombo' => $this->mcombo->mcombotable('categoria'),
			'tipo_materialcombo' => $this->mcombo->mcombotable('tipo_material'),
			'marcacombo' => $this->mcombo->mcombotable('marca'),
			'unmedidacombo' => $this->mcombo->mcombotable('unmedida'),
			'colorcombo' => $this->mcombo->mcombotable('color'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/venta/vlist', $data);
		$this->load->view('layouts/footer');
	}
	//insert
	public function cadd()
	{
	$data = array(
		'tipo_comprobantecombo' => $this->mcombo->mcombotable('tipo_comprobante'),
		'clientecombo' => $this->mcombo->mcombotable('cliente'),
		'productocombos' => $this->mproducto->mselectproducto(1,0),

	);


		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/venta/vadd',$data);
		$this->load->view('layouts/footer');

	}


    
}
?>