<?php
defined('BASEPATH') or exit('No direct script access allowed');

class controller_pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna_model');
        $this->load->library('pagination');

    }

    public function index()
    {

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = $this->input->get('keyword');
        }


        //PAGINATION
        $this->db->like('username', $data['keyword']);
        $this->db->or_like('nama_lengkap', $data['keyword']);
        $this->db->or_like('peran', $data['keyword']);
        $this->db->from('pengguna');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;
        //meyimpan keyword dalam url
        $config['reuse_query_string'] = TRUE;
        $config['base_url'] = site_url("controller_pengguna/index?keyword=" . $data['keyword']);

        $data['total_rows'] = $config['total_rows'];

        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(3);

        $data['pengguna'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data1['pengguna'] = $this->pengguna_model->getUser($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view("layout/headerAdmin", $data);
        $this->load->view("display/admin/user", $data1);
        $this->load->view("layout/footer", $data);
    }
    public function delete($id)
    {
        $result = $this->pengguna_model->delete($id);

        if ($result > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak bisa menghapus data</div>');
        }

        redirect('controller_pengguna');
    }
    public function edit($id)
{
    $data1['pengguna'] = $this->pengguna_model->getById($id);
    $data['pengguna'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('username', 'Username', 'required', [
        'required' => 'Username Wajib di isi'
    ]);
    $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', [
        'required' => 'Nama Lengkap Wajib di isi'
    ]);
    $this->form_validation->set_rules('peran', 'Peran', 'required', [
        'required' => 'Peran Wajib di isi',
    ]);

    if ($this->form_validation->run() == false) {
        $this->load->view("layout/headerAdmin", $data);
        $this->load->view("Form_Edit/edit_user", $data1);
        $this->load->view("layout/footer");
    } else {
        $postData = [
            'username' => $this->input->post('username'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'peran' => $this->input->post('peran'),
        ];
        $id = $this->input->post('user_Id');
        $this->pengguna_model->update(['user_Id' => $id], $postData);
        $this->session->set_flashdata('message', '<div class="alert alert-success"
            role="alert">Data user Berhasil DiUbah!</div>');
        redirect('controller_pengguna');
    }
}








}



