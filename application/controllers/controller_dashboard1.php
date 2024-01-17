<?php
defined('BASEPATH') or exit('No direct script access allowed');

class controller_dashboard1 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengguna_model');
		$this->load->model('pengingat_pembayaran_model');
		$this->load->model('transaksi_model');
	}

	public function index()
	{
		// Mengambil data pengguna
		$username = $this->session->userdata('username');
		$data['pengguna'] = $this->db->get_where('pengguna', ['username' => $username])->row_array();


	
		$userId = $data['pengguna']['user_Id'];
		$data['pengingat_pembayaran'] = $this->pengingat_pembayaran_model->notifikasi($userId);
		$data1['pengingat_pembayaran'] = $this->pengingat_pembayaran_model->getById($userId);	
		$data1['transaksi'] = $this->transaksi_model->getSumByUserId($userId);
		




		// Memuat tampilan
		$this->load->view("layout/headerMember", $data);
		$this->load->view("display/member/dashboard1", $data1);
		$this->load->view("layout/footer", $data);
	}
	public function pembayaran()
	{
		$username = $this->session->userdata('username');
		$data['pengguna'] = $this->db->get_where('pengguna', ['username' => $username])->row_array();
		$userId = $data['pengguna']['user_Id'];
		$data['pengingat_pembayaran'] = $this->pengingat_pembayaran_model->notifikasi($userId);
		
		$data['transaksi'] = $this->transaksi_model->get();

		$this->form_validation->set_rules('deskripsi', 'Nama Pembayaran', 'required', [
			'required' => 'Nama Pembayaran wajib di isi'
		]);

		$this->form_validation->set_rules('tipe', 'Tipe', 'required', [
			'required' => 'Tipe wajib di isi'
		]);
		$this->form_validation->set_rules('jumlah', 'jumlah', 'required', [
			'required' => 'jumlah wajib di isi'
		]);
		

		if ($this->form_validation->run() == false) {
			$this->load->view("layout/headerMember", $data);
			$this->load->view("display/member/pembayaran", $data);
			$this->load->view("layout/footer");
		} else {
			$postData = [
				'deskripsi' => $this->input->post('deskripsi'),
				'tipe' => $this->input->post('tipe'),
				'jumlah' => $this->input->post('jumlah'),
				'tanggal_transaksi' =>date('Y-m-d'),
				'user_id' => $this->input->post('user_id')
			];
			

			$this->transaksi_model->insert($postData);

			$this->session->set_flashdata('message', '<div class="alert alert-success"
            role="alert">Telah berhasil melakukan pembayaran</div>');
			redirect('controller_dashboard1');
		}
	}
	

}