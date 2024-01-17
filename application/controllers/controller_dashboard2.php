<?php
defined('BASEPATH') or exit('No direct script access allowed');

class controller_dashboard2 extends CI_Controller
{ 

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengguna_model');
		$this->load->model('transaksi_model');

	}

	public function index()
	{

		$data['transaksi'] = $this->transaksi_model->total();
		$data['pengeluaran'] = $this->transaksi_model->pengeluaran();
		$data['sisa'] = $this->transaksi_model->sisa();

		$data['pengguna'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("layout/headerKaprodi", $data);
		$this->load->view("display/kaprodi/dashboard2", $data);
		$this->load->view("layout/footer", $data);
	}
}
