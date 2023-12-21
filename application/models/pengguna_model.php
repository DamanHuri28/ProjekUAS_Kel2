<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class pengguna_model extends CI_Model
{
    public $table = 'pengguna';
    public $id = 'pengguna.user_id';
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
    // Fungsi untuk menghitung jumlah baris data dengan keyword
    public function count()
    {
        return $this->db->get($this->table)->num_rows();
    }
    public function getUser($limit,$start,$keyword=null){

        if($keyword){
            $this->db->like('username', $keyword);
            $this->db->or_like('nama_lengkap', $keyword);
            $this->db->or_like('peran', $keyword);
        }
        return $this->db->get($this->table,$limit,$start)->result_array();
    }

    
}