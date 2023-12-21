<?php
defined('BASEPATH') or exit('No direct script access allowed');

class controller_auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengguna_model', 'userrole');
	}

	public function index()
	{
		$this->load->view('layout/auth_header');
		$this->load->view('auth/login');
		$this->load->view('layout/auth_footer');
	}
	public function register()
	{
		$this->load->view('layout/auth_header');
		$this->load->view('auth/register');
		$this->load->view('layout/auth_footer');
	}
	public function cek_register()
	{
		$data = [
			'username' => htmlspecialchars($this->input->post('username', true)),
			'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'peran' => "Admin",
		];

		$this->userrole->insert($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Akun anda berhasil dibuat</div>');
		redirect('controller_auth');

	}
	public function cek_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->db->get_where('pengguna', ['username' => $username])->row_array();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'peran' => $user['peran'],
					'user_Id' => $user['user_id'],

				];
				$this->session->set_userdata($data);
				if ($user['peran'] == 'Admin') {
					redirect('controller_dashboard');
				}elseif($user['peran'] =='kaprodi'){
					redirect('controller_dashboard2');
                }else {
					redirect('controller_dashboard1');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
				redirect('controller_auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">email belum terdaftar</div>');
			redirect('controller_auth');
		}
	}
	public function logout()
	{ {
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('peran');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout</div>');
			redirect('controller_auth');
		}
	}
}

