<?php
defined('BASEPATH') or exit('No direct script access allowed');

class controller_reminder extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengingat_pembayaran_model');
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
        $this->db->like('pengguna.nama_lengkap', $data['keyword']);
        $this->db->or_like('pengingat_pembayaran.deskripsi', $data['keyword']);
        $this->db->or_like('pengingat_pembayaran.tanggal_jatuh_tempo', $data['keyword']);
        $this->db->or_like('pengingat_pembayaran.status_pembayaran', $data['keyword']);
        $this->db->from('pengingat_pembayaran');
        $this->db->join('pengguna', 'pengguna.user_Id = pengingat_pembayaran.user_id', 'left');  
     
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;
        //meyimpan keyword dalam url
        $config['reuse_query_string'] = TRUE;
        $config['base_url'] = site_url("controller_reminder/index?keyword=" . $data['keyword']);

        $data['total_rows'] = $config['total_rows'];

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);

        $data['pengguna'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data1['pengingat_pembayaran'] = $this->pengingat_pembayaran_model->getReminder($config['per_page'], $data['start'], $data['keyword']);
    
        $this->load->view("layout/headerAdmin", $data);
        $this->load->view("display/admin/reminder", $data1);
        $this->load->view("layout/footer", $data);
    }

    public function kaprodi()
    {

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = $this->input->get('keyword');
        }


        //PAGINATION
        $this->db->like('pengguna.nama_lengkap', $data['keyword']);
        $this->db->or_like('pengingat_pembayaran.deskripsi', $data['keyword']);
        $this->db->or_like('pengingat_pembayaran.tanggal_jatuh_tempo', $data['keyword']);
        $this->db->or_like('pengingat_pembayaran.status_pembayaran', $data['keyword']);
        $this->db->from('pengingat_pembayaran');
        $this->db->join('pengguna', 'pengguna.user_Id = pengingat_pembayaran.user_id', 'left');  
     
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;
        //meyimpan keyword dalam url
        $config['reuse_query_string'] = TRUE;
        $config['base_url'] = site_url("controller_reminder/index?keyword=" . $data['keyword']);

        $data['total_rows'] = $config['total_rows'];

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);

        $data['pengguna'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data1['pengingat_pembayaran'] = $this->pengingat_pembayaran_model->getReminder($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view("layout/headerKaprodi", $data);
        $this->load->view("display/kaprodi/reminder2", $data1);
        $this->load->view("layout/footer", $data);
    }

    public function delete($id)
    {
        $result = $this->pengingat_pembayaran_model->delete($id);

        if ($result > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak bisa menghapus data</div>');
        }

        redirect('controller_reminder');
    }
    public function edit($id)
{
    $data1['pengingat_pembayaran'] = $this->pengingat_pembayaran_model->getById($id);
    $data['pengguna'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
        'required' => 'Deskripsi Wajib di isi'
    ]);
    $this->form_validation->set_rules('status_pembayaran', 'Status Pembayaran', 'required', [
        'required' => 'Status Pembayaran Wajib di isi',
    ]);

    if ($this->form_validation->run() == false) {
        $this->load->view("layout/headerAdmin", $data);
        $this->load->view("Form_Edit/edit_reminder", $data1);
        $this->load->view("layout/footer");
    } else {
        $postData = [
            'deskripsi' => $this->input->post('deskripsi'),
            'status_pembayaran' => $this->input->post('status_pembayaran'),
        ];
        $id = $this->input->post('reminder_id');
        $this->pengingat_pembayaran_model->update(['reminder_id' => $id], $postData);
        $this->session->set_flashdata('message', '<div class="alert alert-success"
            role="alert">Data Reminder Berhasil DiUbah!</div>');
        redirect('controller_reminder');
    }
}
public function tambah()
{   
    $data['pengguna'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
    $data1['pengguna'] = $this->pengguna_model->get();

    $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', [
        'required' => 'Nama Lengkap wajib di isi'
    ]);

    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
        'required' => 'Deskripsi wajib di isi'
    ]);
    $this->form_validation->set_rules('tanggal_jatuh_tempo', 'Tanggal Jatuh Tempo', 'required', [
        'required' => 'Tanggal Jatuh Tempo wajib di isi'
    ]);
    $this->form_validation->set_rules('status_pembayaran', 'Status Pembayaran', 'required', [
        'required' => 'Status Pembayaran wajib di isi',
    ]);

    if ($this->form_validation->run() == false) {
        $this->load->view("layout/headerAdmin", $data);
        $this->load->view("Form_Tambah/tambah_reminder",$data1);
        $this->load->view("layout/footer");
    } else {
        $postData = [
            'user_Id' =>  $this->input->post('nama_lengkap'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal_jatuh_tempo' => date('Y-m-d', strtotime($this->input->post('tanggal_jatuh_tempo'))),
            'status_pembayaran' => $this->input->post('status_pembayaran'),
        ];
        
        $this->pengingat_pembayaran_model->insert($postData);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success"
            role="alert">Data Reminder Berhasil Ditambahkan!</div>');
        redirect('controller_reminder');
    }
}

}







