<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class transaksi_model extends CI_Model
{
    public $table = 'transaksi';
    public $id = 'transaksi.transaksi_id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function count()
    {
        return $this->db->get($this->table)->num_rows();
    }
    public function getSumByUserId($userId)
    {
        $this->db->select_sum('jumlah', 'total_sum');
        $this->db->where('user_Id', $userId);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }
    public function getRiwayat($limit, $start, $keyword = null)
    {
        $username = $this->session->userdata('username');
        $user = $this->db->get_where('pengguna', ['username' => $username])->row_array();
        $userId = $user['user_Id'];
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('user_id', $userId);

        if ($keyword) {
            $this->db->like('deskripsi', $keyword);
            $this->db->or_like('jumlah', $keyword);
            $this->db->or_like('tanggal_transaksi', $keyword);
        }

        $this->db->limit($limit, $start);

        return $this->db->get()->result_array();

    }
    public function getRiwayatAll($limit, $start, $keyword = null)
    {
        $this->db->select('transaksi.*, pengguna.nama_lengkap');
        $this->db->from('transaksi');
        $this->db->join('pengguna', 'pengguna.user_Id = transaksi.user_id');

        if ($keyword) {
            $this->db->like('pengguna.nama_lengkap', $keyword);
            $this->db->or_like('transaksi.deskripsi', $keyword);
            $this->db->or_like('transaksi.tipe', $keyword);
            $this->db->or_like('transaksi.jumlah', $keyword);
            $this->db->or_like('transaksi.tanggal_transaksi', $keyword);
        }

        $this->db->limit($limit, $start);

        return $this->db->get()->result_array();

    }
    public function total() {
        $this->db->select_sum('jumlah', 'total');
        $query = $this->db->get($this->table);
        return $query->row_array();
    }

    public function pengeluaran() {
        $this->db->select_sum('jumlah', 'total_keluar');
        $this->db->where('transaksi.tipe', 'pengeluaran');
        $query = $this->db->get($this->table);
        return $query->row_array();
    }public function sisa() {
        $this->db->select_sum('jumlah', 'total_pemasukan');
        $this->db->where('transaksi.tipe', 'pemasukan');
        $query_pemasukan = $this->db->get($this->table);
        $total_pemasukan = $query_pemasukan->row_array()['total_pemasukan'];
    
        $this->db->select_sum('jumlah', 'total_pengeluaran');
        $this->db->where('transaksi.tipe', 'pengeluaran');
        $query_pengeluaran = $this->db->get($this->table);
        $total_pengeluaran = $query_pengeluaran->row_array()['total_pengeluaran'];
    
        $data_tersisa = $total_pemasukan - $total_pengeluaran;
    
        return $data_tersisa;
    }




}