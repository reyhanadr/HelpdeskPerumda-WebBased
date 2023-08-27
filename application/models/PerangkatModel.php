<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PerangkatModel extends CI_Model {
    public function getPerangkatUser($username) {
        $this->db->select('perangkat.*, users.username, users.nama, problemcategories.nama_kategori');
        $this->db->from('perangkat');
        $this->db->join('users', 'users.user_id = perangkat.user_id');
        $this->db->join('problemcategories', 'problemcategories.kategori_id = perangkat.kategori_id ');
        $this->db->where('users.username', $username);
        return $this->db->get()->result();
    }
    public function simpan_perangkat($data) {
        return $this->db->insert('perangkat', $data);
    }
    public function getDepartemen() {
        $this->db->select('departemen_id, nama_departemen');
        $query = $this->db->get('departments');
        return $query->result();
    }

    public function getPerangkatById($perangkat_id) {
        $this->db->where('id', $perangkat_id);
        return $this->db->get('perangkat')->row();
    }

    public function updatePerangkat($perangkat_id, $data) {
        $this->db->where('id', $perangkat_id);
        $this->db->update('perangkat', $data);
    }

    public function getKategori() {
        $this->db->select('kategori_id, nama_kategori');
        $query = $this->db->get('problemcategories');
        return $query->result();
    }
    public function update_perangkat($perangkat_id, $data) {
        $this->db->where('id', $perangkat_id);
        $this->db->update('perangkat', $data);
    }
    public function delete_perangkat($perangkat_id){
        $this->db->where('id', $perangkat_id);
        $this->db->delete('perangkat');
    }
    public function searchPerangkat($keyword) {
        $this->db->select('perangkat.*, users.nama, problemcategories.nama_kategori');
        $this->db->from('perangkat');
        $this->db->join('users', 'perangkat.user_id = users.user_id', 'left');
        $this->db->join('problemcategories', 'perangkat.kategori_id = problemcategories.kategori_id', 'left');
        

        $this->db->like('perangkat.nomer_seri', $keyword);
        $this->db->or_like('perangkat.nama_perangkat', $keyword);
        $this->db->or_like('perangkat.spesifikasi', $keyword);
        $this->db->or_like('perangkat.lokasi_fisik', $keyword);
        $this->db->or_like('problemcategories.nama_kategori', $keyword);
        $this->db->or_like('perangkat.status_perangkat', $keyword);
        $this->db->or_like('perangkat.foto', $keyword);
        $this->db->or_like('users.nama', $keyword);


        return $this->db->get()->result();


    }
}


