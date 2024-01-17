<?php
defined('BASEPATH') or exit('No direct script access allowed');

class controller_riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
        $this->load->model('pengguna_model');
        $this->load->model('pengingat_pembayaran_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = $this->input->get('keyword');
        }

        $username = $this->session->userdata('username');
        $data['pengguna'] = $this->db->get_where('pengguna', ['username' => $username])->row_array();
        $userId = $data['pengguna']['user_Id'];
        $data['pengingat_pembayaran'] = $this->pengingat_pembayaran_model->notifikasi($userId);

        // PAGINATION
        $this->db->or_like('deskripsi', $data['keyword']);
        $this->db->or_like('jumlah', $data['keyword']);
        $this->db->or_like('tanggal_transaksi', $data['keyword']);
        $this->db->from('transaksi');
        $this->db->where('user_id', $userId);

        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;
        $config['reuse_query_string'] = TRUE;
        $config['base_url'] = site_url("controller_riwayat/index?keyword=" . $data['keyword']);
        $data['total_rows'] = $config['total_rows'];

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['transaksi'] = $this->transaksi_model->getRiwayat($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view("layout/headerMember", $data);
        $this->load->view("display/member/riwayat", $data);
        $this->load->view("layout/footer");
    }
}


