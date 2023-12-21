<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('pengguna_model');
	}
	
	public function index()
	{
		$data['pengguna'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("layout/headerAdmin",$data);
		$this->load->view("display/admin/dashboard",$data);
		$this->load->view("layout/footer",$data);
		
		
	}
	
	
}
