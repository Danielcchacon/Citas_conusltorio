<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cdashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
	if(!$this->session->userdata('login')){
		redirect(base_url().'clogin');
	 } 
	 $this->load->model('mdashboard');
	}
	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/vdashboard');
		$this->load->view('layouts/footer');
	
		
	}
	public function listdatacalendar(){

	}
	public function addcita(){
$id_medico =$this->input->post('');
$id_paciente = $this->input->post('');

$data = array(


);

$citas = $this->mdashboard->minsertcita();




	}
}
?>