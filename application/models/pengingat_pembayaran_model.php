<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengingat_pembayaran_model extends CI_Model
{
    public $table = 'pengingat_pembayaran';
    public $id = 'pengingat_pembayaran.reminder_id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->db->select('pengingat_pembayaran.*, pengguna.nama_lengkap');
        $this->db->from($this->table);
        $this->db->join('pengguna', 'pengguna.user_Id = pengingat_pembayaran.user_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getById($id)
    {
        $this->db->select('pengingat_pembayaran.*, pengguna.nama_lengkap');
        $this->db->from($this->table);
        $this->db->join('pengguna', 'pengguna.user_Id = pengingat_pembayaran.user_id');
        $this->db->where('status_pembayaran','Belum Dibayar');
        $this->db->where('pengingat_pembayaran.user_id', $id);
        $query = $this->db->get();
        return $query->result();    
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
    public function getReminder($limit, $start, $keyword = null)
    {
        $this->db->select('pengingat_pembayaran.*, pengguna.nama_lengkap');
        $this->db->from($this->table);
        $this->db->join('pengguna', 'pengguna.user_Id = pengingat_pembayaran.user_id', 'left');

        if ($keyword) {
            $this->db->like('pengguna.nama_lengkap', $keyword);
            $this->db->or_like('pengingat_pembayaran.deskripsi', $keyword);
            $this->db->or_like('pengingat_pembayaran.tanggal_jatuh_tempo', $keyword);
            $this->db->or_like('pengingat_pembayaran.status_pembayaran', $keyword);
        }

        $this->db->limit($limit, $start);

        return $this->db->get()->result_array();
    }
        public function notifikasi($id)
        {
            $this->db->select('deskripsi,DATEDIFF(tanggal_jatuh_tempo, CURDATE()) AS interval_tgl');
            $this->db->from($this->table);
            $this->db->join('pengguna','pengguna.user_Id =pengingat_pembayaran.user_id');
            $this->db->where('status_pembayaran','Belum Dibayar');
            $this->db->where('pengingat_pembayaran.user_id', $id);

            $query = $this->db->get();
            return $query->result();    
        }
}
