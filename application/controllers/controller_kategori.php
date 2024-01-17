<?php
defined('BASEPATH') or exit('No direct script access allowed');

class controller_kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
        $this->load->model('pengguna_model');
        $this->load->library('pagination');

    }
    public function index(){
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = $this->input->get('keyword');
        }
        


        //PAGINATION
        $this->db->like('pengguna.nama_lengkap', $data['keyword']);
        $this->db->or_like('transaksi.deskripsi', $data['keyword']);
        $this->db->or_like('transaksi.tipe', $data['keyword']);
        $this->db->or_like('transaksi.jumlah', $data['keyword']);
        $this->db->or_like('transaksi.tanggal_transaksi', $data['keyword']);
        $this->db->from('transaksi');
        $this->db->join('pengguna', 'pengguna.user_Id = transaksi.user_id');  
        
     
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;
        //meyimpan keyword dalam url
        $config['reuse_query_string'] = TRUE;
        $config['base_url'] = site_url("controller_kategori/index?keyword=" . $data['keyword']);
        $data['total_rows'] = $config['total_rows'];
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['pengguna'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['transaksi'] = $this->transaksi_model->getRiwayatAll($config['per_page'], $data['start'], $data['keyword']);


        $this->load->view("layout/headerAdmin", $data);
        $this->load->view("display/admin/kategori", $data);
        $this->load->view("layout/footer", $data);
    }

    public function kaprodi(){
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = $this->input->get('keyword');
        }
        


        //PAGINATION
        $this->db->like('pengguna.nama_lengkap', $data['keyword']);
        $this->db->or_like('transaksi.deskripsi', $data['keyword']);
        $this->db->or_like('transaksi.tipe', $data['keyword']);
        $this->db->or_like('transaksi.jumlah', $data['keyword']);
        $this->db->or_like('transaksi.tanggal_transaksi', $data['keyword']);
        $this->db->from('transaksi');
        $this->db->join('pengguna', 'pengguna.user_Id = transaksi.user_id');  
        
     
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;
        //meyimpan keyword dalam url
        $config['reuse_query_string'] = TRUE;
        $config['base_url'] = site_url("controller_kategori/index?keyword=" . $data['keyword']);
        $data['total_rows'] = $config['total_rows'];
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['pengguna'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['transaksi'] = $this->transaksi_model->getRiwayatAll($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view("layout/headerKaprodi", $data);
        $this->load->view("display/admin/kategori", $data);
        $this->load->view("layout/footer", $data);
    }
}